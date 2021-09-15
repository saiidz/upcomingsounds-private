<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUp;
use App\Http\Requests\Login;
use App\Http\Requests\UpdateProfile;
use App\Http\Resources\LoginResource;
use App\Http\Resources\UpdateProfile as UpdateProfileResource;
use App\Models\Config;
use App\Models\UserDocument;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Twilio\Rest\Client;

class PassportController extends Controller
{
    /**
     * create user
    */
    public function signup(SignUp $request){
        $input = $request->all();
        $input['password'] = Hash::make($request->get('password'));
        $input['type']     = 'user';
        $user              = User::create($input);
        $tokenResult       = $user->createToken('Personal Access Token');
        $data['token']      = $tokenResult->accessToken;
        $data['user']  = $user;

        return sendResponse($request->wantsJson(),null,$data,'User created Successfully.',200);
    }
    /**
     * Login user and create token
    */
    public function login(Login $request){
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }
        if (Auth::user()->status == 'block') {
            Auth::logout();
            return sendResponse($request->wantsJson(),null, null,'Your account has been blocked permanently.',200);
        } elseif ( Auth::user()->status == 'suspend') {
            $suspension_days = Config::where('key', 'suspension_days')->first();
            Auth::logout();
            return sendResponse($request->wantsJson(),null, null,"Your account has been suspended for {$suspension_days->value } days.",200);
        } else {
            $user          = $request->user();
            $tokenResult   = $user->createToken('Personal Access Token');
            $data['token'] = $tokenResult->accessToken;
            $data['user']  = $user;
            return sendResponse($request->wantsJson(),null,LoginResource::make($data),'User Login Successfully.',200);
        }
    }
    /**
     * Continue With PhoneNumber
     */
    public function continueWithPhoneNumber(Request $request){
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users,phone_number',
        ]);

        if ($validator->fails()) {
            if($request->wantsJson()){
                return sendError($request->wantsJson(),null,$validator->messages(), 'The given data was invalid', 422);
            }else{
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
//        if ($validator->fails()) {
//            return sendError($validator->messages(), 'The given data was invalid', 422);
//        }
        $user = User::where('phone_number', $request->get('phone_number'))->first();

        $otp  = rand(100000,999999);

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create($request->get('phone_number'), [
            'from' => $twilio_number,
            'body' => $otp.' is your verification code for signing into your mi auto account.']);

        if (isset($user)){
            $user->update([
                'otp' => $otp
            ]);
            // call send sms helper
            return sendResponse($request->wantsJson(),null,null,'OTP sent Successfully.',200);
        }else{
            $input = $request->all();
            $input['name']     = null;
            $input['password'] = Hash::make($request->get('password'));
            $input['type']     = 'user';
            $input['otp']      = $otp;
            $user              = User::create($input);
            $data['user']      = $user;
            // call send sms helper
            return sendResponse($request->wantsJson(),null,$data,'User created OTP sent Successfully.',200);
        }
    }
    /**
     * User update profile
     */
    public function updateProfile(UpdateProfile $request){
        $input = $request->all();

        $input['email'] = isset($request->user()->email) ? $request->user()->email : $input['email'];
        $input['phone_number'] = isset($request->user()->phone_number) ? $request->user()->phone_number : $input['phone_number'];

        if(!$request->user()->userDocuments()->exists() && !$request->hasfile('document')){
            if($request->wantsJson()){
                return response()->json([
                    'status'    => FALSE,
                    'error' =>  'Document is Required',
                ]);
            }else{
                return Redirect::back()->withErrors(['Document is Required']);
            }
        } elseif ($request->hasfile('document')) {
            foreach($request->file('document') as $file)
            {
                $name = $file->getClientOriginalName();
                $image_path = 'default_'.time().$name;
                $file->move(public_path().'/uploads/user_document/', $image_path);
                //store image file into directory and db
                $input['path'] = $image_path;
                $input['type'] = 'document';
                $request->user()->userDocuments()->create($input);
            }
        }
        $input['type'] = 'user';
        $request->user()->update($input);
        $data['user']  = User::find($request->user()->id);
//        $data['user'] =  !empty($data['user']->userDocuments) ? $data['user']->userDocuments : null;
        if ($request->wantsJson()){
            return sendResponse($request->wantsJson(),null,UpdateProfileResource::make($data),'User Profile Successfully Updated.',200);
        }else {
            return redirect()->back()->with('success','User Profile Successfully Updated.');
        }
    }
    /**
     * Verify Otp
     */
    public function verifyOTP(Request $request){
        $validator = Validator::make($request->all(), [
            'otp'           => 'required|min:6',
            'phone_number'  => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
        ]);
        if ($validator->fails()) {
            return sendError($validator->messages(), 'The given data was invalid', 422);
        }
        $user = User::where('phone_number', $request->get('phone_number'))->first();

        if (isset($user)){
            if ($user->otp == $request->get('otp')){
                $tokenResult    = $user->createToken('Personal Access Token');
                $data['token']  = $tokenResult->accessToken;
                $data['user']   = $user;
                if (isset($user->is_verified_at)){
                    return sendResponse($request->wantsJson(),null,$data,'User Logged in Successfully!',200);
                }else{
                    $user->update([
                        'is_verified_at' => Carbon::now()
                    ]);
                    return sendResponse($request->wantsJson(),null,$data,'User Verified and logged in Successfully!',200);
                }
            }else{
                return sendError(null, 'Invalid OTP!', 422);
            }
        }else{
            return sendError(null, 'User not found!', 404);
        }
    }
    /**
     * Get the authenticated User
     */
    public function getProfile(Request $request)
    {
        if($request->wantsJson()){
            $data['user']  = $request->user();
            return sendResponse($request->wantsJson(),null,UpdateProfileResource::make($data),'User Get Profile.',200);
        }else{
            $user = $request->user();
            return view('pages.profile',compact('user'));
        }
    }
    /**
     * Logout user (Revoke the token)
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

//        $request->user()->token()->revoke();
        return sendResponse($request->wantsJson(),'welcome',null,'User Successfully logged out.',200);
    }

    /**
     * Document Delete user
     */
    public function deleteDocument(Request $request){
        $document = UserDocument::where('id',$request->get('document_id'))->first();
        $document->delete();
        if ($request->wantsJson()){
            return sendResponse($request->wantsJson(),null, null,'Document Image Deleted Successfully.',200);
        }else {
            return response()->json([
                'success' => 'Document Image has been deleted!',
            ]);
        }
    }
    /**
     * Show the manage password view.
     */
    public function managePassword(Request $request)
    {
        $user = $request->user();
        return view('pages.change_password',compact('user','request'));
    }

    /**
     * Show the manage password view.
     */
    public function createPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => [new MatchOldPassword],
            'password'         => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($validator->fails()) {
            if($request->wantsJson()){
                return sendError($request->wantsJson(),null,$validator->messages(), 'The given data was invalid', 422);
            }else{
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        $user = $request->user();
        if(!empty($user->email) && !empty($user->password)){
            if (Hash::check($request->get('current_password'), $user->password)) {
                User::find($user->id)->update(['password'=> Hash::make($request->get('password'))]);
                if($request->wantsJson()){
                    return sendResponse($request->wantsJson(),null,null,'Password change Successfully.',200);
                }else{
                    return redirect()->back()->with('success', 'Password change successfully.');
                }
            }
        }elseif(!empty($user->email) && empty($user->password)){
            if(empty($request->get('current_password'))){
                User::find($user->id)->update(['password'=> Hash::make($request->get('password'))]);
                if($request->wantsJson()){
                    return sendResponse($request->wantsJson(),null,null,'Password Created Successfully.',200);
                }else{
                    return redirect('/get-profile')->with('success', 'Password Created successfully.');
                }
            }
        }
    }

    /**
     * User upload Profile
     */
    public function uploadProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($validator->fails()) {
            if ($request->wantsJson()) {
                return sendError($request->wantsJson(), null, $validator->messages(), 'The given data was invalid', 422);
            }else{
                return response()->json([
                        'status'    => FALSE,
                        'error' =>  'The file must be a file of type: jpeg, jpg, png.',
                ]);
            }
        }
        $request->user()->userDocuments()->where('type','profile')->delete();
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $image_path = 'default_' . time() . $name;
            $file->move(public_path() . '/uploads/user_profile/', $image_path);
            //store image file into directory and db
            $input['path'] = $image_path;
            $input['type'] = 'profile';
            $profile_user = $request->user()->userDocuments()->create($input);
        }

        if ($request->wantsJson()) {
            return sendResponse($request->wantsJson(), null, $profile_user, 'User image Successfully Updated.', 200);
        } else {
            return response()->json([
                'status'    => TRUE,
                'profile_user' => $profile_user,
                'success' => 'User image Successfully Updated.',
            ]);
        }
    }

}

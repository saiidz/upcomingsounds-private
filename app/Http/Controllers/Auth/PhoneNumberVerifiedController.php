<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PhoneNumberVerifiedController extends Controller
{
    /**
     * curatorPhoneNumber
     */
    public function curatorPhoneNumber(Request $request)
    {
        $user = $request->user();
        return !$request->user()->phone_number || $request->user()->is_phone_verified == 0
            ? view('pages.curators.curator-phone-number.phone-number',compact('user','request'))
            : redirect()->intended(RouteServiceProvider::CURATOR);
    }

    /**
     * storeCuratorPhoneNumber
     *
     * @return mixed
     */
    public function storeCuratorPhoneNumber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'unique:users,phone_number,'. Auth::user()->id,
//            'phone_number' => ['required', 'unique:users'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if(!empty($request->get('phone_number'))){
            // call to otp function
            $otp  = rand(100000,999999);
            try{
//                Helper::twilioOtp($request->get('phone_number'),$otp.' is your verification code for signing into your tastemaker account.');
            }catch (\Exception   $e){
                return redirect()->back()->with('error', $e->getMessage());
            }

            Auth::user()->update([
                'phone_number' => ($request->get('phone_number')) ? $request->get('phone_number') : Auth::user()->phone_number,
                'otp' => $otp,
            ]);
        }
        return redirect()->route('curator.verify.otp')->with('success','OTP sent Successfully.');
    }

    /**
     * curatorVerifyOtp
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function curatorVerifyOtp(Request $request)
    {
        if(!empty(Auth::user()->phone_number) && Auth::user()->is_phone_verified == 0){
            return view('pages.curators.curator-phone-number.verify-otp');
        }else{
            return redirect()->back();
        }

    }

    /**
     * postCuratorVerifyOtp
     *
     * @return mixed
     */
    public function postCuratorVerifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('curator.verify.otp')
                ->withErrors($validator)
                ->withInput();
        }

        $otp = implode('',$request->otp);
        $user = User::find($request->user_id);


        if(isset($user)){
            if($user->otp == (int) $otp){
                $user->update([
                    'is_phone_verified' => 1,
                ]);
                if($user->is_phone_verified == 1){
                    $success = 'Phone Number is verified';
                    $request->session()->put('success_phone_number', $success);
                }
            }else{
                $error = 'You have entered invalid code please verify it';
                return Redirect::route('curator.verify.otp')->with(['error' => $error]);
            }
        }else{
            $error = 'User does not exist';
            return Redirect::route('curator.verify.otp')->with(['error' => $error]);
        }

        return redirect()->intended(RouteServiceProvider::CURATOR);
    }

    /**
     * verifySendAgainOtpCode.
     */
    public function verifySendAgainOtpCode(Request $request)
    {
        $user = User::find($request->get('user_id'));
        if($user->phone_number == $request->get('phone_number')){
            $otp  = rand(100000,999999);
            $user->update([
                'otp' => $otp,
            ]);
            Helper::twilioOtp($user->phone_number,$otp.' is your verification code for signing into your tastemaker account.');

            $success = 'OTP sent Successfully.';
            return response()->json(['status'    => TRUE, 'success' => $success, 'otp' => $otp]);
        }else{
            $error = 'You have entered invalid phone number';
            return response()->json([['error' => $error]]);
        }
    }
}

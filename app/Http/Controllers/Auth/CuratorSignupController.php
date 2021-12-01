<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CuratorSignupController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return !$request->user()->curator_completed_signup
            ? view('pages.curators.curator-signup-step-1')
            : redirect()->intended(RouteServiceProvider::CURATOR);

    }

    /**
     * curatorSignupStep2
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function curatorSignupStep2(Request $request)
    {
        if($request->get('signup') == 'influencer'){
//            dd('influencer');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'playlist_curator'){
//            dd('playlist_curator');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'youtube_channel'){
//            dd('youtube_channel');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'radio_tv'){
//            dd('radio_tv');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'label_manager'){
//            dd('label_manager');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'media'){
//            dd('media');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'monitor_publisher_synch'){
//            dd('monitor_publisher_synch');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'journalist_media'){
//            dd('journalist_media');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'brooker_booking'){
//            dd('brooker_booking');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        }elseif ($request->get('signup') == 'sound_expert_producer'){
//            dd('sound_expert_producer');
            $request->session()->put('curator_signup', $request->get('signup'));
            $countries = Country::all();
            return view('pages.curators.curator-signup.curator-signup-step-2',compact('countries'));

        } else{
            return redirect()->back();
        }
    }

    /**
     * postCuratorSignupStep2
     *
     * @return mixed
     */
    public function postCuratorSignupStep2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tastemaker_name'  => 'required|string|min:2|max:50',
            'country_name' => 'required',
            'phone_number' => 'required',
//            'phone_number' => ['required', 'unique:users'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user_phone_number_exists = User::where('phone_number',$request->phone_pattern)->first();

        if(isset($user_phone_number_exists)){
            if($user_phone_number_exists->phone_number == $request->phone_pattern){
                return redirect()->back()->with('error', 'Phone Number is already exists');
            }
        }

        $request->session()->get('curator_signup');
        $request->session()->put('curator_data', $request->all());
        if(!empty(Auth::user()) && !empty($request->get('phone_number'))){

            // call to otp function
            $otp  = rand(100000,999999);
            try{
                Helper::twilioOtp($request->get('phone_pattern'),$otp.' is your verification code for signing into your tastemaker account.');
            }catch (\Exception   $e){
                return redirect()->back()->with('error', $e->getMessage());
            }

            Auth::user()->update([
                'phone_number' => ($request->get('phone_pattern')) ? $request->get('phone_pattern') : Auth::user()->phone_number,
                'otp' => $otp,
            ]);
        }
        return redirect()->route('curator.signup.step.3')->with('success','OTP sent Successfully.');
    }
    /**
     * curatorSignupStep3
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function curatorSignupStep3(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');

        if(!empty($curator_data) && !empty($curator_signup)){
            return view('pages.curators.curator-signup.curator-signup-step-3',compact('curator_data','curator_signup'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postCuratorSignupStep3
     *
     * @return mixed
     */
    public function postCuratorSignupStep3(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('curator.signup.step.3')
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
                $success = 'Phone Number is verified';
            }else{
                $error = 'You have entered invalid code please verify it';
                return Redirect::route('curator.signup.step.3')->with(['error' => $error]);
            }
        }else{
            $error = 'User does not exist';
            return Redirect::route('curator.signup.step.3')->with(['error' => $error]);
        }

        if(!empty($request->session()->get('curator_data')) && !empty($request->session()->get('curator_signup'))){
            $request->session()->get('curator_data');
            $request->session()->get('curator_signup');
            return Redirect::route('curator.signup.step.4')->with(['success' => $success]);
        }
    }

    /**
     * curatorSignupStep4
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function curatorSignupStep4(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');

        if(!empty($curator_data) && !empty($curator_signup)){
            return view('pages.curators.curator-signup.curator-signup-step-4',compact('curator_data','curator_signup'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postCuratorSignupStep4
     *
     * @return mixed
     */
    public function postCuratorSignupStep4(Request $request)
    {
        if(isset($request->instagram_url) || isset($request->facebook_url) || isset($request->spotify_url) || isset($request->soundcloud_url) || isset($request->youtube_url) || isset($request->website_url))    {
            $curator_signup = $request->session()->get('curator_signup');
            $curator_data = $request->session()->get('curator_data');

            $auth_id = Auth::user()->id;
            $user = User::find($auth_id);

            if(isset($user)){
                if(isset($curator_signup) || isset($curator_data)){

                    $input['user_id']             = $user->id;
                    $input['curator_signup_from'] = isset($curator_signup) ? $curator_signup : null;;
                    $input['tastemaker_name']     = isset($curator_data['tastemaker_name']) ? $curator_data['tastemaker_name'] : null;
                    $input['country_id']          = isset($curator_data['country_name']) ? (int) $curator_data['country_name'] : null;
                    $input['instagram_url']       = ($request->get('instagram_url')) ? $request->get('instagram_url') : null;
                    $input['facebook_url']        = ($request->get('facebook_url')) ? $request->get('facebook_url') : null;
                    $input['spotify_url']         = ($request->get('spotify_url')) ? $request->get('spotify_url') : null;
                    $input['soundcloud_url']      = ($request->get('soundcloud_url')) ? $request->get('soundcloud_url') : null;
                    $input['youtube_url']         = ($request->get('youtube_url')) ? $request->get('youtube_url') : null;
                    $input['website_url']         = ($request->get('website_url')) ? $request->get('website_url') : null;
                    $user->curatorUser()->create($input);


                    // Curator Signup complete
                    $user->update(['curator_completed_signup' => Carbon::now()]);

                    return redirect('/taste-maker-profile')->with('success','Tastemaker Profile is created successfully');
                }else{
                    return redirect()->back()->with('error', 'Please fill out data');
                }
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->back()->with('error', 'One field is required');
        }
    }
}

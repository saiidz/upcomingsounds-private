<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CuratorFeature;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Sovit\TikTok;

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
            'phone_number' => 'unique:users,phone_number,'. Auth::user()->id,
//            'phone_number' => ['required', 'unique:users'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

//        $user_phone_number_exists = User::where('phone_number',$request->phone_pattern)->first();
//
//        if(isset($user_phone_number_exists)){
//            if($user_phone_number_exists->phone_number == $request->phone_pattern){
//                return redirect()->back()->with('error', 'Phone Number is already exists');
//            }
//        }

        $request->session()->get('curator_signup');
        $request->session()->put('curator_data', $request->all());
        if(!empty(Auth::user()) && !empty($request->get('phone_number'))){

            // call to otp function
            $otp  = rand(100000,999999);
            try{
                Helper::twilioOtp($request->get('phone_number'),$otp.' is your verification code for signing into your tastemaker account.');
            }catch (\Exception   $e){
                return redirect()->back()->with('error', $e->getMessage());
            }

            Auth::user()->update([
                'phone_number' => ($request->get('phone_number')) ? $request->get('phone_number') : Auth::user()->phone_number,
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
        if(!empty(Auth::user()->phone_number)){
            $curator_signup = $request->session()->get('curator_signup');
            $curator_data = $request->session()->get('curator_data');

            if(!empty($curator_data) && !empty($curator_signup)){
                return view('pages.curators.curator-signup.curator-signup-step-3',compact('curator_data','curator_signup'));
            }else{
                return redirect()->back();
            }
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

        if ($curator_signup == 'influencer'){
            return view('pages.curators.curator-influencer-signup.influencer-share-music',compact('curator_data','curator_signup'));
        }elseif ($curator_signup == 'youtube_channel'){
            return view('pages.curators.curator-youtube-signup.youtube-share-music',compact('curator_data','curator_signup'));
        }else{
            return redirect()->back();
        }
    }

    /***************************************************** Influencer Functions *********************************************************/

    /**
     * postInfluencerSignupStep4
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function postInfluencerSignupStep4(Request $request)
    {
        $request->session()->get('curator_signup');
        $request->session()->get('curator_data');
        $request->session()->put('influencer_data', $request->all());

        return redirect()->route('influencer.signup.step.5');
    }

    /**
     * influencerSignupStep5
     */
    public function influencerSignupStep5(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data)){
            if($influencer_data['share_music'] == 'influencer_instagram'){
                return view('pages.curators.curator-influencer-signup.influencer-instgram-details',compact('curator_data','curator_signup'));
            }elseif ($influencer_data['share_music'] == 'influencer_tiktok'){
                return view('pages.curators.curator-influencer-signup.influencer-tiltok-details',compact('curator_data','curator_signup'));
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * postInfluencerSignupStep5
     */
    public function postInfluencerSignupStep5(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data)){
            return redirect()->route('curator.signup.step.6');
        }else{
            return redirect()->back();
        }
    }

    /***************************************************** Influencer Functions *********************************************************/


    /**
     * curatorSignupStep6
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function curatorSignupStep6(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data)){
            return view('pages.curators.curator-signup.social-media',compact('curator_data','curator_signup','influencer_data'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postCuratorSignupStep6
     *
     * @return mixed
     */
    public function postCuratorSignupStep6(Request $request)
    {
        if(isset($request->instagram_url) || isset($request->tiktok_url) || isset($request->facebook_url) || isset($request->spotify_url) || isset($request->soundcloud_url) || isset($request->youtube_url) || isset($request->website_url))    {

            // instagram api use for followers user count
            if(!empty($request->instagram_url)){
                $str = $request->instagram_url;
                $values = parse_url($str);
                $host = explode('/',$values['path']);
                $username = (isset($host[1])) ? $host[1] : '';
                if(empty($username)){
                    return redirect()->back()->with('error', 'You have entered instagram invalid url. Please add correct url');
                }
                $response = Http::get("https://www.instagram.com/$username/?__a=1");
                if($response->status() == 404 || empty($response->collect())){
                    return redirect()->back()->with('error', 'You have entered invalid instagram url. Please add correct url');
                }
                $instagram_followers = $response->collect()['graphql']['user']['edge_followed_by']['count'];
                $need_instagram_followers = 15000;
                if($need_instagram_followers >= $instagram_followers){
                    return redirect()->back()->with('error', 'Your instagram followers is '.$instagram_followers.'. You need at least 15,000 Instagram followers to apply as an Influencer');
                }
            }

            // tiktok api use for followers user count
            if(!empty($request->tiktok_url)){
                $str = $request->tiktok_url;
                $values = parse_url($str);
                $host = explode('@',$values['path']);
                $username = (isset($host[1])) ? $host[1] : '';

                if(empty($username)){
                    return redirect()->back()->with('error', 'You have entered Tiktok invalid url. Please add correct url');
                }
                $api = new \Sovit\TikTok\Api(array(
                    "api_key"		=> "API_KEY"
                ), $cache_engine=false);

                // get tiktok user info
                $userData = $api->getUser($username);

                if(empty($userData->user)){
                    return redirect()->back()->with('error', 'You have entered Tiktok invalid url. Please add correct url');
                }

                $tiktok_followers = $userData->stats->followerCount;

                $need_tiktok_followers = 15000;
                if($need_tiktok_followers >= $tiktok_followers){
                    return redirect()->back()->with('error', 'Your Tiktok followers is '.$tiktok_followers.'. You need at least 15,000 Tiktok followers to apply as an Influencer');
                }
            }

            // Youtube api use for subscriber count
            if(!empty($request->youtube_url)){
                $str = $request->youtube_url;
                $values = parse_url($str);
                $host = explode('/',$values['path']);
                $channel_id = (isset($host[2])) ? $host[2] : '';

                if(empty($channel_id)){
                    return redirect()->back()->with('error', 'You have entered Youtube invalid url. Please add correct url');
                }


                $response = Http::get('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channel_id.'&key=AIzaSyBHT17QSOzWlBr578dulEEN030aboaHXug');

                if(empty($response->collect()['items'])){
                    return redirect()->back()->with('error', 'You have entered invalid Youtube url. Please add correct url');
                }
                $youtube_followers = $response->collect()['items'][0]['statistics']['subscriberCount'];

                $need_youtube_followers = 15000;
                if($need_youtube_followers >= $youtube_followers){
                    return redirect()->back()->with('error', 'Your youtube followers is '.$youtube_followers.'. You need at least 15,000 Youtube Subscriber to apply as an Youtuber');
                }
            }

            $curator_signup = $request->session()->get('curator_signup');
            $curator_data = $request->session()->get('curator_data');
            $influencer_data = $request->session()->get('influencer_data');
            $request->session()->put('influencer_social_data', $request->all());

            if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data)){
                return redirect()->route('curator.signup.step.7');
            }else{
                return redirect()->back()->with('error', 'Please fill out data');
            }
        }else{
            return redirect()->back()->with('error', 'One field is required');
        }
    }

    /**
     * curatorSignupStep7
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function curatorSignupStep7(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');
        $influencer_social_data = $request->session()->get('influencer_social_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data) && !empty($influencer_social_data)){
            $curator_features = CuratorFeature::all();
            return view('pages.curators.curator-signup.curator-signup-step-5',compact('curator_data','curator_signup','influencer_data','influencer_social_data','curator_features'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postInfluencerSignupStep7
     *
     * @return mixed
     */
    public function postCuratorSignupStep7(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');
        $influencer_social_data = $request->session()->get('influencer_social_data');
        $request->session()->put('curator_tags', $request->all());

        if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data) && !empty($influencer_social_data)){
            return redirect()->route('curator.signup.step.8');
        }else{
            return redirect()->back();
        }
    }

    /**
     * curatorSignupStep8
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function curatorSignupStep8(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');
        $influencer_social_data = $request->session()->get('influencer_social_data');
        $curator_tags = $request->session()->get('curator_tags');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data) && !empty($influencer_social_data) && !empty($curator_tags)){
            return view('pages.curators.curator-signup.curator-signup-step-6',compact('curator_data','curator_signup','influencer_data','influencer_social_data','curator_tags'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postCuratorSignupStep8
     *
     * @return mixed
     */
    public function postCuratorSignupStep8(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');
        $influencer_social_data = $request->session()->get('influencer_social_data');
        $curator_tags = $request->session()->get('curator_tags');

        $auth_id = Auth::user()->id;
        $user = User::find($auth_id);

        if(isset($user)){
            if(isset($curator_signup) || isset($curator_data) || isset($influencer_data) || isset($influencer_social_data) || isset($curator_tags)){

                $input['user_id']                = $user->id;
                $input['curator_signup_from']    = isset($curator_signup) ? $curator_signup : null;;
                $input['tastemaker_name']        = isset($curator_data['tastemaker_name']) ? $curator_data['tastemaker_name'] : null;
                $input['country_id']             = isset($curator_data['country_name']) ? (int) $curator_data['country_name'] : null;
                $input['share_music']            = isset($influencer_data['share_music']) ? $influencer_data['share_music'] : null;
                $input['instagram_url']          = isset($influencer_social_data['instagram_url']) ? $influencer_social_data['instagram_url'] : null;
                $input['tiktok_url']             = isset($influencer_social_data['tiktok_url']) ? $influencer_social_data['tiktok_url'] : null;
                $input['facebook_url']           = isset($influencer_social_data['facebook_url']) ? $influencer_social_data['facebook_url'] : null;
                $input['spotify_url']            = isset($influencer_social_data['spotify_url']) ? $influencer_social_data['spotify_url'] : null;
                $input['soundcloud_url']         = isset($influencer_social_data['soundcloud_url']) ? $influencer_social_data['soundcloud_url'] : null;
                $input['youtube_url']            = isset($influencer_social_data['youtube_url']) ? $influencer_social_data['youtube_url'] : null;
                $input['website_url']            = isset($influencer_social_data['website_url']) ? $influencer_social_data['website_url'] : null;
                $input['come_upcoming']          = ($request->get('come_upcoming')) ? $request->get('come_upcoming') : null;
                $user->curatorUser()->create($input);

                // user tags store
                if(!empty($curator_tags)){
                    foreach($curator_tags['tag'] as $tag)
                    {
                        $input['user_id']        = $user->id;
                        $input['curator_feature_tag_id'] = (int) $tag;
                        $user->curatorUserTags()->create($input);
                    }
                }

                // Curator Signup complete
                $user->update(['curator_completed_signup' => Carbon::now()]);

                return redirect('/taste-maker-profile')->with('success','Tastemaker Profile is created successfully');
            }else{
                return redirect()->back()->with('error', 'Please fill out data');
            }
        }else{
            return redirect()->route('login');
        }
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

    /**
     * instagramProfileShow.
     */
    public function instagramProfileShow(Request $request)
    {
        if(!empty($request->instagram_url)){
            $str = $request->instagram_url;
            $values = parse_url($str);
            $host = explode('/',$values['path']);
            $username = (isset($host[1])) ? $host[1] : '';
            if(empty($username)){
                return response()->json(['error' => 'You have entered instagram invalid url. Please add correct url']);
            }
            $response = Http::get("https://www.instagram.com/$username/?__a=1");
            if($response->status() == 404){
                return response()->json(['error' => 'You have entered instagram invalid url. Please add correct url']);
            }

            $instagram = $response->json();
            $instagram_user = $instagram['graphql']['user'];

            // instagram profile
            $path = $instagram['graphql']['user']['profile_pic_url'];
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $instagram_profile = 'data:image/' . $type . ';base64,' . base64_encode($data);

            return response()->json(['success' => 'success', 'instagram_user' => $instagram_user, 'instagram_profile' => $instagram_profile]);
        }
    }

    /**
     * tiktokProfileShow.
     */
    public function tiktokProfileShow(Request $request)
    {
        if(!empty($request->tiktok_url)){
            $str = $request->tiktok_url;
            $values = parse_url($str);
            $host = explode('@',$values['path']);
            $username = (isset($host[1])) ? $host[1] : '';

            if(empty($username)){
                return response()->json(['error' => 'You have entered Tiktok invalid url. Please add correct url']);
            }
            $api = new \Sovit\TikTok\Api(array(
                "api_key"		=> "API_KEY"
            ), $cache_engine=false);

            // get tiktok user info
            $userData=$api->getUser($username);

            if(empty($userData->user)){
                return response()->json(['error' => 'You have entered Tiktok invalid url. Please add correct url']);
            }

            $tiktok_user = $userData->user;
            $tiktok_followers = $userData->stats->followerCount;

            // tiktok profile
            $path = $tiktok_user->avatarMedium;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $tiktok_profile = 'data:image/' . $type . ';base64,' . base64_encode($data);

            return response()->json(['success' => 'success', 'tiktok_user' => $tiktok_user, 'tiktok_followers' => $tiktok_followers, 'tiktok_profile' => $tiktok_profile]);
        }
    }

    /**
     * youtubeSubscriberShow.
     */
    public function youtubeSubscriberShow(Request $request)
    {

        if(!empty($request->youtube_url)){
            $str = $request->youtube_url;
            $values = parse_url($str);
            $host = explode('/',$values['path']);
            $channel_id = (isset($host[2])) ? $host[2] : '';

            if(empty($channel_id)){
                return response()->json(['error' => 'You have entered Youtube invalid url. Please add correct url']);
            }

            $response = Http::get('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channel_id.'&key=AIzaSyBHT17QSOzWlBr578dulEEN030aboaHXug');

            if(empty($response->collect()['items'])){
                return response()->json(['error' => 'You have entered Youtube invalid url. Please add correct url']);
            }
            $youtube_followers = $response->collect()['items'][0]['statistics']['subscriberCount'];
            $youtube_channel_id = $response->collect()['items'][0]['id'];

            return response()->json(['success' => 'success', 'youtube_followers' => $youtube_followers, 'youtube_channel_id' => $youtube_channel_id]);
        }
    }
}

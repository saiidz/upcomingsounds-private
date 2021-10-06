<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Feature;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ArtistSignupController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->artist_completed_signup
        ? redirect()->intended(RouteServiceProvider::HOME)
        : view('pages.artists.artist-signup-step-1');

    }

    /**
     * artistSignupStep2
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupStep2(Request $request)
    {
        $countries = Country::all();
        return view('pages.artists.artist-signup.artist-signup-step-2',compact('countries'));
    }
    /**
     * postArtistSignupStep2
     *
     * @return mixed
     */
    public function postArtistSignupStep2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'artist_name'  => 'required|string|min:2|max:50',
            'country_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $request->session()->put('artist_data', $request->all());

        return redirect()->route('artist.signup.step.3');
    }


    /**
     * artistSignupStep3
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupStep3(Request $request)
    {
        $artist_data = $request->session()->get('artist_data');

        if(!empty($artist_data)){
            return view('pages.artists.artist-signup.artist-signup-step-3',compact('artist_data'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep3
     *
     * @return mixed
     */
    public function postArtistSignupStep3(Request $request)
    {
        if(isset($request->instagram_url) || isset($request->facebook_url) || isset($request->spotify_url) || isset($request->soundcloud_url) || isset($request->youtube_url))    {
            if(!empty($request->session()->get('artist_data'))){
                $request->session()->get('artist_data');
                $request->session()->put('artist_social', $request->all());
            }else{
                $request->session()->put('artist_social', $request->all());
            }
            return redirect()->route('artist.signup.step.4');
        }else{
            return redirect()->back()->with('error_message', 'One field is required');
        }
//        $validator = Validator::make($request->all(), [
//            'instagram_url'  => 'url',
//            'facebook_url' => 'required|url',
//            'spotify_url' => 'required|url',
//            'soundcloud_url' => 'required|url',
//            'youtube_url' => 'required|url',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }


    }

    /**
     * artistSignupStep4
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupStep4(Request $request)
    {
        $artist_data = $request->session()->get('artist_data');
        $artist_social = $request->session()->get('artist_social');
        if(!empty($artist_data) && !empty($artist_social)){
            $features = Feature::all();
            return view('pages.artists.artist-signup.artist-signup-step-4',compact('artist_data','artist_social', 'features'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep4
     *
     * @return mixed
     */
    public function postArtistSignupStep4(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $artist_data = $request->session()->get('artist_data');
        $artist_social = $request->session()->get('artist_social');

        if(!empty($artist_data) && !empty($artist_social)){
            $request->session()->get('artist_data');
            $request->session()->get('artist_social');
            $request->session()->put('artist_tags', $request->all());
        }else{
            $request->session()->put('artist_tags', $request->all());
        }
        return redirect()->route('artist.signup.step.5');
    }

    /**
     * artistSignupStep5
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupStep5(Request $request)
    {
        $artist_data = $request->session()->get('artist_data');
        $artist_social = $request->session()->get('artist_social');
        $artist_tags = $request->session()->get('artist_tags');

        if(!empty($artist_data) && !empty($artist_social) && !empty($artist_tags)){
            return view('pages.artists.artist-signup.artist-signup-step-5',compact('artist_data','artist_social','artist_tags'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep5
     *
     * @return mixed
     */
    public function postArtistSignupStep5(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'profile'  => 'required|mimes:jpeg,jpg,png,mp4|max:2048',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }

        if ($request->hasfile('profile')) {
            $file = $request->file('profile');
            $name = $file->getClientOriginalName();
            $image_path = 'default_' . time() . $name;
            $file->move(public_path() . '/uploads/profile/', $image_path);
            //store image file into directory and db
            $input['profile'] = $image_path;
            auth()->user()->update($input);
        }

        $artist_data = $request->session()->get('artist_data');
        $artist_social = $request->session()->get('artist_data');
        $artist_tags = $request->session()->get('artist_tags');

        if(!empty($artist_data) && !empty($artist_social) && !empty($artist_tags)){
            $request->session()->get('artist_data');
            $request->session()->get('artist_data');
            $request->session()->get('artist_tags');
        }else{
            return redirect()->back();
        }
        return redirect()->route('artist.signup.step.6');
    }


    /**
     * artistSignupStep5
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupStep6(Request $request)
    {
        $artist_data = $request->session()->get('artist_data');
        $artist_social = $request->session()->get('artist_social');
        $artist_tags = $request->session()->get('artist_tags');

        if(!empty($artist_data) && !empty($artist_social) && !empty($artist_tags)){
            return view('pages.artists.artist-signup.artist-signup-step-6',compact('artist_data','artist_social','artist_tags'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep5
     *
     * @return mixed
     */
    public function postArtistSignupStep6(Request $request)
    {
        $artist_data = $request->session()->get('artist_data');
        $artist_social = $request->session()->get('artist_data');
        $artist_tags = $request->session()->get('artist_tags');

        if(!empty($artist_data) && !empty($artist_social) && !empty($artist_tags)){
            $request->session()->get('artist_data');
            $request->session()->get('artist_data');
            $request->session()->get('artist_tags');
            $request->session()->put('released', $request->all());
        }else{
            $request->session()->put('released', $request->all());
        }
        return redirect()->route('artist.signup.step.7');
    }

    /**
     * artistSignupStep5
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupStep7(Request $request)
    {

        $artist_data = $request->session()->get('artist_data');
        $artist_social = $request->session()->get('artist_social');
        $artist_tags = $request->session()->get('artist_tags');
        $released = $request->session()->get('released');

        if(!empty($artist_data) && !empty($artist_social) && !empty($artist_tags)){
            return view('pages.artists.artist-signup.artist-signup-step-7',compact('artist_data','artist_social','artist_tags','released'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep5
     *
     * @return mixed
     */
    public function postArtistSignupStep7(Request $request)
    {

        $artist_data = $request->session()->get('artist_data');
        $artist_social = $request->session()->get('artist_social');
        $artist_tags = $request->session()->get('artist_tags');
        $released = $request->session()->get('released');

        $auth_id = Auth::user()->id;

        $user = User::find($auth_id);

        if(isset($user)){
            if(isset($artist_data) || isset($artist_social) || isset($artist_tags) || isset($released)){
                if(isset($released['released_current'])){
                    $released_day = $released['released_current'];
                }elseif (isset($released['released_finished'])){
                    $released_day = $released['released_finished'];
                }else{
                    $released_day = null;
                }

                $input['user_id']        = $user->id;
                $input['artist_name']    = isset($artist_data['artist_name']) ? $artist_data['artist_name'] : null;
                $input['country_id']     = isset($artist_data['country_name']) ? (int) $artist_data['country_name'] : null;
                $input['instagram_url']  = isset($artist_social['instagram_url']) ? $artist_social['instagram_url'] : null;
                $input['facebook_url']   = isset($artist_social['facebook_url']) ? $artist_social['facebook_url'] : null;
                $input['spotify_url']    = isset($artist_social['spotify_url']) ? $artist_social['spotify_url'] : null;
                $input['soundcloud_url'] = isset($artist_social['soundcloud_url']) ? $artist_social['soundcloud_url'] : null;
                $input['youtube_url']    = isset($artist_social['youtube_url']) ? $artist_social['youtube_url'] : null;
                $input['released']       = isset($released['released']) ? $released['released'] : null;
                $input['released_day']   = $released_day;
                $input['come_upcoming']  = !empty($request->get('come_upcoming')) ? $request->get('come_upcoming') : null;
                $user->artistUsers()->create($input);

                // user tags store
                if(!empty($artist_tags)){
                    foreach($artist_tags['tag'] as $tag)
                    {
                        $input['user_id']        = $user->id;
                        $input['feature_tag_id'] = (int) $tag;
                        $user->userTags()->create($input);
                    }
                }
                // Artist Signup complete
                $user->update(['artist_completed_signup' => Carbon::now()]);

                return redirect('/dashboard')->with('success','Artist Profile is created successfully');
            }else{
                return redirect()->back()->with('error', 'Please fill out data');
            }
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * Artist Home
     */
    public function index()
    {
        return view('pages.artists.artist-home');
    }
    /**
     * Artists
     */
    public function artists()
    {
        return view('pages.artists.artists_details');
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Feature;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArtistSignupRepresentativeController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return !$request->user()->artist_completed_signup
            ? view('pages.artists.artist-signup-step-1')
            : redirect()->intended(RouteServiceProvider::HOME);

//        return $request->user()->artist_completed_signup
//            ? redirect()->intended(RouteServiceProvider::HOME)
//            : view('pages.artists.artist-signup-step-1');

    }

    /**
     * artistSignupRepresentativeStep2
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupRepresentativeStep2(Request $request)
    {
        if($request->get('signup') == 'representative'){
            $countries = Country::all();
            return view('pages.artists.artist-signup-representative.artist-signup-step-2',compact('countries'));
        }else{
            return redirect()->back();
        }
    }
    /**
     * postArtistSignupRepresentativeStep2
     *
     * @return mixed
     */
    public function postArtistSignupRepresentativeStep2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'artist_country_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $request->session()->put('artist_representative_data', $request->all());

        return redirect()->route('artist.signup.representative.step.3');
    }


    /**
     * artistSignupRepresentativeStep3
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupRepresentativeStep3(Request $request)
    {
        $artist_representative_data = $request->session()->get('artist_representative_data');
        $countries = Country::all();
        if(!empty($artist_representative_data)){
            return view('pages.artists.artist-signup-representative.artist-signup-step-3',compact('artist_representative_data','countries'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupRepresentativeStep3
     *
     * @return mixed
     */
    public function postArtistSignupRepresentativeStep3(Request $request)
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

        if(!empty($request->session()->get('artist_representative_data'))){
            $request->session()->get('artist_representative_data');
            $request->session()->put('artist_artist_data', $request->all());
        }else{
            $request->session()->put('artist_artist_data', $request->all());
        }
        return redirect()->route('artist.signup.representative.step.4');
    }

    /**
     * artistSignupStep4
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupRepresentativeStep4(Request $request)
    {
        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');

        if(!empty($artist_representative_data) && !empty($artist_artist_data)){
            return view('pages.artists.artist-signup-representative.artist-signup-step-4',compact('artist_representative_data','artist_artist_data'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep4
     *
     * @return mixed
     */
    public function postArtistSignupRepresentativeStep4(Request $request)
    {
        if(isset($request->instagram_url) || isset($request->facebook_url) || isset($request->spotify_url) || isset($request->soundcloud_url) || isset($request->youtube_url) || isset($request->website_url))    {
            $artist_representative_data = $request->session()->get('artist_representative_data');
            $artist_artist_data = $request->session()->get('artist_artist_data');

            if(!empty($artist_representative_data) && !empty($artist_artist_data)){
                $request->session()->get('artist_representative_data');
                $request->session()->get('artist_artist_data');
                $request->session()->put('artist_representative_social', $request->all());
            }else{
                $request->session()->put('artist_representative_social', $request->all());
            }
            return redirect()->route('artist.signup.representative.step.5');
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
     * artistSignupStep5
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupRepresentativeStep5(Request $request)
    {
        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');
        $artist_representative_social = $request->session()->get('artist_representative_social');

        if(!empty($artist_representative_data) && !empty($artist_artist_data) && !empty($artist_representative_social)){
            $features = Feature::all();
            return view('pages.artists.artist-signup-representative.artist-signup-step-5',compact('artist_representative_data','artist_artist_data','artist_representative_social','features'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep5
     *
     * @return mixed
     */
    public function postArtistSignupRepresentativeStep5(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');
        $artist_representative_social = $request->session()->get('artist_representative_social');

        if(!empty($artist_representative_data) && !empty($artist_artist_data) && !empty($artist_representative_social)){
            $request->session()->get('artist_representative_data');
            $request->session()->get('artist_artist_data');
            $request->session()->get('artist_representative_social');
            $request->session()->put('artist_representative_tags', $request->all());
        }else{
            $request->session()->put('artist_representative_tags', $request->all());
        }
        return redirect()->route('artist.signup.representative.step.6');
    }


    /**
     * artistSignupStep5
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupRepresentativeStep6(Request $request)
    {
        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');
        $artist_representative_social = $request->session()->get('artist_representative_social');
        $artist_representative_tags = $request->session()->get('artist_representative_tags');

        if(!empty($artist_representative_data) && !empty($artist_artist_data) && !empty($artist_representative_social) && !empty($artist_representative_tags)){
            return view('pages.artists.artist-signup-representative.artist-signup-step-6',compact('artist_representative_data','artist_artist_data','artist_representative_social','artist_representative_tags'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep5
     *
     * @return mixed
     */
    public function postArtistSignupRepresentativeStep6(Request $request)
    {
//        $profile_exist = auth()->user() ? auth()->user()->profile : '';
//        $image = public_path('uploads/profile/' . $profile_exist);
//        if(file_exists($image)) {
//            unlink($image);
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

        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');
        $artist_representative_social = $request->session()->get('artist_representative_social');
        $artist_representative_tags = $request->session()->get('artist_representative_tags');

        if(!empty($artist_representative_data) && !empty($artist_artist_data) && !empty($artist_representative_social) && !empty($artist_representative_tags)){
            $request->session()->get('artist_representative_data');
            $request->session()->get('artist_artist_data');
            $request->session()->get('artist_representative_social');
            $request->session()->get('artist_representative_tags');
        }else{
            return redirect()->back();
        }
        return redirect()->route('artist.signup.representative.step.7');
    }

    /**
     * artistSignupStep5
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupRepresentativeStep7(Request $request)
    {
        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');
        $artist_representative_social = $request->session()->get('artist_representative_social');
        $artist_representative_tags = $request->session()->get('artist_representative_tags');

        if(!empty($artist_representative_data) && !empty($artist_artist_data) && !empty($artist_representative_social) && !empty($artist_representative_tags)){
            return view('pages.artists.artist-signup-representative.artist-signup-step-7',compact('artist_representative_data','artist_artist_data','artist_representative_social','artist_representative_tags'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * artistSignupStep5
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function postArtistSignupRepresentativeStep7(Request $request)
    {
        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');
        $artist_representative_social = $request->session()->get('artist_representative_social');
        $artist_representative_tags = $request->session()->get('artist_representative_tags');

        if(!empty($artist_representative_data) && !empty($artist_artist_data) && !empty($artist_representative_social) && !empty($artist_representative_tags)){
            $request->session()->get('artist_representative_data');
            $request->session()->get('artist_artist_data');
            $request->session()->get('artist_representative_social');
            $request->session()->get('artist_representative_tags');
            $request->session()->put('released_representative', $request->all());
        }else{
            $request->session()->put('released_representative', $request->all());
        }
        return redirect()->route('artist.signup.representative.step.8');
    }

    /**
     * artistSignupStep5
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupRepresentativeStep8(Request $request)
    {
        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');
        $artist_representative_social = $request->session()->get('artist_representative_social');
        $artist_representative_tags = $request->session()->get('artist_representative_tags');
        $released_representative = $request->session()->get('released_representative');

        if(!empty($artist_representative_data) && !empty($artist_artist_data) && !empty($artist_representative_social) && !empty($artist_representative_tags) && !empty($released_representative)){
            return view('pages.artists.artist-signup-representative.artist-signup-step-8',compact('artist_representative_data','artist_artist_data','artist_representative_social','artist_representative_tags'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * postArtistSignupStep5
     *
     * @return mixed
     */
    public function postArtistSignupRepresentativeStep8(Request $request)
    {

        $artist_representative_data = $request->session()->get('artist_representative_data');
        $artist_artist_data = $request->session()->get('artist_artist_data');
        $artist_representative_social = $request->session()->get('artist_representative_social');
        $artist_representative_tags = $request->session()->get('artist_representative_tags');
        $released_representative = $request->session()->get('released_representative');

        $auth_id = Auth::user()->id;

        $user = User::find($auth_id);

        if(isset($user)){
            if(isset($artist_representative_data) || isset($artist_artist_data) || isset($artist_representative_social) || isset($artist_representative_tags) || isset($released_representative)){
                if(isset($released_representative['released_current'])){
                    $released_day = $released_representative['released_current'];
                }elseif (isset($released_representative['released_finished'])){
                    $released_day = $released_representative['released_finished'];
                }else{
                    $released_day = null;
                }

                $input['user_id']                         = $user->id;
                $input['artist_signup_from']              = 'artist_representative';
                $input['artist_representative_record']    = isset($artist_representative_data['artist_representative_record']) ? $artist_representative_data['artist_representative_record'] : null;
                $input['artist_representative_manager']   = isset($artist_representative_data['artist_representative_manager']) ? $artist_representative_data['artist_representative_manager'] : null;
                $input['artist_representative_press']     = isset($artist_representative_data['artist_representative_press']) ? $artist_representative_data['artist_representative_press'] : null;
                $input['artist_representative_publisher'] = isset($artist_representative_data['artist_representative_publisher']) ? $artist_representative_data['artist_representative_publisher'] : null;
                $input['artist_country_id']               = isset($artist_representative_data['artist_country_name']) ? $artist_representative_data['artist_country_name'] : null;
                $input['artist_name']                     = isset($artist_artist_data['artist_name']) ? $artist_artist_data['artist_name'] : null;
                $input['country_id']                      = isset($artist_artist_data['country_name']) ? (int) $artist_artist_data['country_name'] : null;
                $input['instagram_url']                   = isset($artist_representative_social['instagram_url']) ? $artist_representative_social['instagram_url'] : null;
                $input['facebook_url']                    = isset($artist_representative_social['facebook_url']) ? $artist_representative_social['facebook_url'] : null;
                $input['spotify_url']                     = isset($artist_representative_social['spotify_url']) ? $artist_representative_social['spotify_url'] : null;
                $input['soundcloud_url']                  = isset($artist_representative_social['soundcloud_url']) ? $artist_representative_social['soundcloud_url'] : null;
                $input['youtube_url']                     = isset($artist_representative_social['youtube_url']) ? $artist_representative_social['youtube_url'] : null;
                $input['website_url']                     = isset($artist_representative_social['website_url']) ? $artist_representative_social['website_url'] : null;
                $input['released']                        = isset($released_representative['released']) ? $released_representative['released'] : null;
                $input['released_day']                    = $released_day;
                $input['come_upcoming']                   = !empty($request->get('come_upcoming')) ? $request->get('come_upcoming') : null;
                $user->artistUser()->create($input);

                // user tags store
                if(!empty($artist_representative_tags)){
                    foreach($artist_representative_tags['tag'] as $tag)
                    {
                        $input['user_id']        = $user->id;
                        $input['feature_tag_id'] = (int) $tag;
                        $user->userTags()->create($input);
                    }
                }
                // Artist Signup complete
                $user->update(['artist_completed_signup' => Carbon::now()]);

                return redirect('/artist-profile')->with('success','Artist Representative Profile is created successfully');
            }else{
                return redirect()->back()->with('error', 'Please fill out data');
            }
        }else{
            return redirect()->route('login');
        }
    }
}

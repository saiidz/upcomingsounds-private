<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\Feature;
use App\Models\FeatureTag;
use App\Models\ReApplyUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
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
        return !$request->user()->artist_completed_signup
        ? view('pages.artists.artist-signup-step-1')
        : redirect()->intended(RouteServiceProvider::HOME);

    }

    /**
     * artistSignupStep2
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function artistSignupStep2(Request $request)
    {
        if($request->get('signup') == 'artist'){
            $countries = Country::all();
            return view('pages.artists.artist-signup.artist-signup-step-2',compact('countries'));
        }else{
            return redirect()->back();
        }

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
        if(isset($request->instagram_url) || isset($request->facebook_url) || isset($request->spotify_url) || isset($request->soundcloud_url) || isset($request->youtube_url) || isset($request->website_url))    {
            if(!empty($request->session()->get('artist_data'))){
                $request->session()->get('artist_data');
                $request->session()->put('artist_social', $request->all());
            }else{
                $request->session()->put('artist_social', $request->all());
            }
            return redirect()->route('artist.signup.step.4');
        }else{
            return redirect()->back()->with('error', 'One field is required');
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
            $features_ids      = Feature::pluck('id')->toArray();
            $new_features = FeatureTag::with('feature')->whereHas('feature', function($q){
                                                $q->select('name');
                                            })->whereIn('feature_id', $features_ids)->get()
                                            ->groupBy('feature.name');

            $features = Feature::all();
            return view('pages.artists.artist-signup.artist-signup-step-4',get_defined_vars());
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

                $input['user_id']            = $user->id;
                $input['artist_signup_from'] = 'artist';
                $input['artist_name']        = isset($artist_data['artist_name']) ? $artist_data['artist_name'] : null;
                $input['country_id']         = isset($artist_data['country_name']) ? (int) $artist_data['country_name'] : null;
                $input['instagram_url']      = isset($artist_social['instagram_url']) ? $artist_social['instagram_url'] : null;
                $input['facebook_url']       = isset($artist_social['facebook_url']) ? $artist_social['facebook_url'] : null;
                $input['spotify_url']        = isset($artist_social['spotify_url']) ? $artist_social['spotify_url'] : null;
                $input['soundcloud_url']     = isset($artist_social['soundcloud_url']) ? $artist_social['soundcloud_url'] : null;
                $input['youtube_url']        = isset($artist_social['youtube_url']) ? $artist_social['youtube_url'] : null;
                $input['website_url']        = isset($artist_social['website_url']) ? $artist_social['website_url'] : null;
                $input['released']           = isset($released['released']) ? $released['released'] : null;
                $input['released_day']       = $released_day;
                $input['come_upcoming']      = !empty($request->get('come_upcoming')) ? $request->get('come_upcoming') : null;
                $user->artistUser()->create($input);

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

                $data['email'] = $user->email;
                $data['username'] = $user->name;
                $data["title"] = "Artist Upcoming Sounds";

                Mail::send('pages.artists.emails.send_email_artist_signup', $data, function($message)use($data) {
                    $message->from('artist@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });

                return redirect('/artist-profile')->with('success','Artist Profile is created successfully');
            }else{
                return redirect()->back()->with('error', 'Please fill out data');
            }
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * artistApprovalAdmin
     */
    public function artistApprovalAdmin(Request $request)
    {
        return ($request->user()->type == 'artist') && ($request->user()->is_approved == 0)
            && ($request->user()->is_rejected == 0)
            ? view('pages.artists.artist-approved-admin.artist-approved')
            : redirect()->intended(RouteServiceProvider::HOME);
    }

     /**
     * artistRejectedAdmin
     */
    public function artistRejectedAdmin(Request $request)
    {
        return ($request->user()->type == 'artist') && ($request->user()->is_approved == 0)
            && ($request->user()->is_rejected == 1)
            ? view('pages.artists.artist-approved-admin.artist-rejected', compact('request'))
            : redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * reApply
     */
    public function reApply(Request $request)
    {
        // find user
        $user = User::where('id',Auth::id())->first();
        if(isset($user))
        {
            return view('pages.re_apply.re-apply', get_defined_vars());
        }else{
            return redirect('/login');
        }

    }

    /**
     * reApplySubmission
     */
    public function reApplySubmission()
    {
        $user = User::where('id',Auth::id())->first();
        if(isset($user))
        {
            // get ReApplyUser
            $re_apply_user = ReApplyUser::where('user_id',$user->id)->first();
            return view('pages.re_apply.apply', get_defined_vars());
        }else{
            return redirect('/login');
        }
    }

    /**
     * storeReApply
     */
    public function storeReApply(Request $request,User $user)
    {
        if($request->re_apply_information == null)
        {
            return redirect()->back()->with('error', 'Describe description is required');
        }

        $re_apply_user = ReApplyUser::where('user_id',$user->id)->first();
        if(isset($re_apply_user))
        {
            // update ReApplyUser
            $re_apply_user->update([
                'description' => $request->re_apply_information,
            ]);
            return redirect()->back()->with('success', 'Request Submit Updated Successfully.');
        }else{
            // create ReApplyUser
            ReApplyUser::create([
                'user_id'     => $user->id,
                'description' => $request->re_apply_information,
            ]);
            return redirect()->back()->with('success', 'Request Submit Successfully.');
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

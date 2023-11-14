<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Artist\ArtistFavoriteCurator;
use App\Models\Option;
use App\Models\User;
use App\Models\Country;
use App\Models\Feature;
use App\Models\UserTag;
use App\Models\Language;
use App\Models\FeatureTag;
use App\Models\ArtistTrack;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\TrackCategory;
use App\Models\CuratorFeature;
use App\Models\CuratorFeatureTag;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use PragmaRX\Countries\Package\Countries;

class ArtistController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function artistProfile()
    {
        $user_artist = Auth::user();
        $selected_feature = $user_artist->userTags->pluck('feature_tag_id')->toArray();
        $countries = Country::all();
//        $countries_flag = new Countries();
//        $countries_flag = $countries_flag->all();
//        $countries_flag =
//            $countries_flag->where('iso_a2',$selected_cs['iso2'])
//                ->first()
//                ->flag
//                ->flag_icon;
//        dd($countries_flag);
            $features_ids      = Feature::pluck('id')->toArray();
            $new_features = FeatureTag::with('feature')->whereHas('feature', function($q){
                                                $q->select('name');
                                            })->whereIn('feature_id', $features_ids)->get()
                                            ->groupBy('feature.name');

        $features = Feature::all();
        $track_categories = TrackCategory::all();
        $curator_features_ids = CuratorFeature::pluck('id')->toArray();
        $curator_featuress = CuratorFeatureTag::with('curatorFeature')->whereHas('curatorFeature', function($q){
                                                $q->select('name');
                                            })->whereIn('curator_feature_id', $curator_features_ids)->get()
                                            ->groupBy('curatorFeature.name');

// dd($curator_sub_features);
        $curator_features = CuratorFeature::all();
        $languages = Language::all();
        $artist_tracks = ArtistTrack::where('user_id',$user_artist->id)->orderBy('id','desc')->get();
        $notifications = auth()->user()->notifications()->latest()->get();
        $unReadNotifications = auth()->user()->unreadNotifications()->latest()->get();

        $savedCurators = ArtistFavoriteCurator::where('artist_id',Auth::id())->latest()->get();
        return view('pages.artists.artist-profile', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateArtistProfile(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name'         => 'alpha_dash',
                'artist_name'  => 'required|string|min:2|max:50',
                'country_name' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $auth_id = Auth::user()->id;
            $user = User::find($auth_id);
            $input = $request->all();
//            $input['name'] = ($request->get('name')) ? $request->get('name') : null;

            // Artist Info Update
            $user->artistUser()->update([
                'artist_name'                     => ($request->get('artist_name')) ? $request->get('artist_name') : null,
                'country_id'                      => ($request->get('country_name')) ? $request->get('country_name') : null,
                'instagram_url'                   => ($request->get('instagram_url')) ? $request->get('instagram_url') : null,
                'facebook_url'                    => ($request->get('facebook_url')) ? $request->get('facebook_url') : null,
                'spotify_url'                     => ($request->get('spotify_url')) ? $request->get('spotify_url') : null,
                'soundcloud_url'                  => ($request->get('soundcloud_url')) ? $request->get('soundcloud_url') : null,
                'youtube_url'                     => ($request->get('youtube_url')) ? $request->get('youtube_url') : null,
                'website_url'                     => ($request->get('website_url')) ? $request->get('website_url') : null,
                'deezer_url'                      => ($request->get('deezer_url')) ? $request->get('deezer_url') : null,
                'bandcamp_url'                    => ($request->get('bandcamp_url')) ? $request->get('bandcamp_url') : null,
                'tiktok_url'                      => ($request->get('tiktok_url')) ? $request->get('tiktok_url') : null,
                'artist_bio'                      => ($request->get('artist_bio')) ? $request->get('artist_bio') : null,
                'hot_news'                        => ($request->get('hot_news')) ? $request->get('hot_news') : null,
                'artist_representative_record'    => ($request->get('artist_representative_record')) ? $request->get('artist_representative_record') : null,
                'artist_representative_manager'   => ($request->get('artist_representative_manager')) ? $request->get('artist_representative_manager') : null,
                'artist_representative_press'     => ($request->get('artist_representative_press')) ? $request->get('artist_representative_press') : null,
                'artist_representative_publisher' => ($request->get('artist_representative_publisher')) ? $request->get('artist_representative_publisher') : null,
            ]);

            // Feature Tag
            if($request->get('tag')){
                $selected_feature = $user->userTags()->pluck('feature_tag_id')->toArray();
                UserTag::whereIn('feature_tag_id',$selected_feature)->delete();
                foreach ($request->get('tag') as $tag){
                    $input['user_id']        = $user->id;
                    $input['feature_tag_id'] = (int) $tag;
                    $user->userTags()->create($input);
                }
            }else{
                return Redirect::back()->with('error','Tag is Required');
            }
            $user->update($input);

            if($request->get('artist_signup_from') == 'artist'){
                return redirect()->back()->with('success','Artist updated successfully.');
            }else{
                return redirect()->back()->with('success','Artist Representative updated successfully.');
            }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadArtistProfile(Request $request)
    {
//        dd($request->all());

//        $path = storage_path('public/' . $request->file('file'));
//        $contents = Storage::disk('s3')->get($path);
//        dd($contents);
//        Storage::disk('s3')->put('path/to/file.ext', 'some-content');
//        $validator = Validator::make($request->all(), [
//            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
//        ]);
//        if ($validator->fails()) {
//            return response()->json([
//                'status'    => FALSE,
//                'error' =>  'The file must be a file of type: jpeg, jpg, png.',
//            ]);
//        }

        $profile_exist = auth()->user() ? auth()->user()->profile : '';
        $image = public_path('uploads/profile/' . $profile_exist);
        if(is_file($image)) {
            unlink($image);
        }
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $image_path = 'default_' . time() . $name;
//            $filePath = 'artistProfile/' . $image_path;
//            Helper::S3_UPLOAD($filePath,$file);
            $file->move(public_path() . '/uploads/profile/', $image_path);
            //store image file into directory and db
            $input['profile'] = $image_path;
            auth()->user()->update($input);
        }

        return response()->json([
            'status'    => TRUE,
            'profile_user' => auth()->user() ? auth()->user()->profile : '',
            'success' => 'Artist Profile Successfully Updated.',
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function artistChangePassword(Request $request){

        //Validate form
        $validator = Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword'
        ],[
            'oldpassword.required'=>'Enter your current password',
            'oldpassword.min'=>'Old password must have atleast 8 characters',
            'oldpassword.max'=>'Old password must not be greater than 30 characters',
            'newpassword.required'=>'Enter new password',
            'newpassword.min'=>'New password must have atleast 8 characters',
            'newpassword.max'=>'New password must not be greater than 30 characters',
            'cnewpassword.required'=>'ReEnter your new password',
            'cnewpassword.same'=>'New password and Confirm new password must match'
        ]);

        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $update = User::find(Auth::user()->id)->update([
                'password' => Hash::make($request->newpassword),
            ]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
            }
        }
    }

    /**
     * @return Application|Factory|View
     */
    // forArtists
    public function forArtists()
    {
//        $classifiedImg = public_path('images/artist-header.jpg');
//        $image = Image::make($classifiedImg)->encode('webp', 90)->save(public_path('images/'  .  'artist-header.webp'));
        $theme = Option::where('key', 'theme_settings')->first();
        if(!empty($theme))
        {
            $theme = json_decode($theme->value);
        }

        return view('pages.artists.artist-details');
    }

    /**
     * @param User $user
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function artistPublicProfile(User $user)
    {
        try {
            if($user->is_public_profile == 1)
            {
                return view('pages.artists.artist-public-profile.public-profile', get_defined_vars());
            }else{
                return abort(403, "Restricted Access!");
            }

        }catch (\Exception $exception)
        {
            return abort(403, "Restricted Access!");
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function artistChangeStatusProfile(Request $request)
    {
       $artist_id = Auth::id();

       // update status public profile
        User::where('id', $artist_id)->update([
            'is_public_profile' => ($request->is_public_profile == 'true') ? 1 : 0,
        ]);

        // artist find
        $artist = User::find($artist_id);

        return response()->json([
            'success' => 'Public Profile Is Updated',
            'is_public_profile' => $artist->is_public_profile ?? null,
        ]);
    }
}

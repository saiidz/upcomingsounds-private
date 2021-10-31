<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Feature;
use App\Models\User;
use App\Models\UserTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
    // Artist Profile
    public function artistProfile(){
        $user_artist = Auth::user();
//        dd($user_artist->userTags[0]->featureTag->name);
        $selected_feature = $user_artist->userTags->pluck('feature_tag_id')->toArray();
        $countries = Country::all();
        $features = Feature::all();
        return view('pages.artists.artist-profile',compact('user_artist','countries','features','selected_feature'));
    }
    // Artist Update Profile
    public function updateArtistProfile(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name'         => 'required|string|min:2|max:50',
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
            $input['name'] = ($request->get('name')) ? $request->get('name') : null;

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
     * User artist upload Profile
     */
    public function uploadArtistProfile(Request $request)
    {
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
        if(file_exists($image)) {
            unlink($image);
        }

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $image_path = 'default_' . time() . $name;
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

}

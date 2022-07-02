<?php

namespace App\Http\Controllers\Curator;

use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\CuratorFeature;
use App\Models\CuratorUserTag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CuratorController extends Controller
{

    /**
     * Curator Home
     */
    public function index()
    {
        return view('pages.curators.curator-home');
    }

    // curatorProfile
    public function curatorProfile(){
        $user_curator = Auth::user();
        $selected_feature = $user_curator->curatorUserTags->pluck('curator_feature_tag_id')->toArray();
        $countries = Country::all();
        $curator_features = CuratorFeature::all();
        // dd($user_curator->curatorUser);
        return view('pages.curators.curator-profile',get_defined_vars());
    }

    /**
     * User Curator upload Profile
     */
    public function uploadCuratorProfile(Request $request)
    {
        $profile_exist = auth()->user() ? auth()->user()->profile : '';
        $image = public_path('uploads/profile/' . $profile_exist);
        if(is_file($image)) {
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
            'success' => 'Curator Profile Successfully Updated.',
        ]);
    }

    // Curator Update Profile
    public function updateCuratorProfile(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name'            => 'required|string|min:2|max:50',
                'address'         => 'required|string|min:2|max:50',
                'tastemaker_name' => 'required|string|min:2|max:50',
                'curator_bio'     => 'required',
                'country_name'    => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $auth_id = Auth::user()->id;
            $user = User::find($auth_id);
            $input = $request->all();
            $input['name']    = ($request->get('name')) ? $request->get('name') : null;
            $input['address'] = ($request->get('address')) ? $request->get('address') : null;

            // Curator Info Update
            $user->curatorUser()->update([
                'tastemaker_name' => ($request->get('tastemaker_name')) ? $request->get('tastemaker_name') : null,
                'curator_bio'     => ($request->get('curator_bio')) ? $request->get('curator_bio') : null,
                'country_id'      => ($request->get('country_name')) ? $request->get('country_name') : null,
                'instagram_url'   => ($request->get('instagram_url')) ? $request->get('instagram_url') : null,
                'facebook_url'    => ($request->get('facebook_url')) ? $request->get('facebook_url') : null,
                'spotify_url'     => ($request->get('spotify_url')) ? $request->get('spotify_url') : null,
                'soundcloud_url'  => ($request->get('soundcloud_url')) ? $request->get('soundcloud_url') : null,
                'youtube_url'     => ($request->get('youtube_url')) ? $request->get('youtube_url') : null,
                'website_url'     => ($request->get('website_url')) ? $request->get('website_url') : null,
                'deezer_url'      => ($request->get('deezer_url')) ? $request->get('deezer_url') : null,
                'apple_url'       => ($request->get('apple_url')) ? $request->get('apple_url') : null,
                'tiktok_url'      => ($request->get('tiktok_url')) ? $request->get('tiktok_url') : null,
            ]);

            // Feature Tag
            if($request->get('tag')){
                $selected_feature = $user->curatorUserTags()->pluck('curator_feature_tag_id')->toArray();
                CuratorUserTag::whereIn('curator_feature_tag_id',$selected_feature)->delete();
                foreach ($request->get('tag') as $tag){
                    $input['user_id']                = $user->id;
                    $input['curator_feature_tag_id'] = (int) $tag;
                    $user->curatorUserTags()->create($input);
                }
            }else{
                return Redirect::back()->with('error','Tag is Required');
            }
            $user->update($input);

            return redirect()->back()->with('success','Curator updated successfully.');

    }

    // forCurators
    public function forCurators(){
        return view('pages.curators.curator-details');
    }
}

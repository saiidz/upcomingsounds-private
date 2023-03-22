<?php

namespace App\Http\Controllers\Curator;

use App\Events\RealTimeNotification;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\CuratorFeature;
use App\Models\CuratorUserTag;
use App\Models\CuratorFeatureTag;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Templates\IMessageTemplates;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Curator\AddTagCuratorRequest;
use Intervention\Image\Facades\Image;

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

        $curator_features_ids = CuratorFeature::pluck('id')->toArray();
        $curator_featuress = CuratorFeatureTag::with('curatorFeature')->whereHas('curatorFeature', function($q){
                                        $q->select('name');
                                    })->whereIn('curator_feature_id', $curator_features_ids)->get()
                                    ->groupBy('curatorFeature.name');

        $curator_features = CuratorFeature::all();
//        event(new RealTimeNotification());
        // dd($curator_featuress);
        $notifications = auth()->user()->notifications()->latest()->get();
        $unReadNotifications = auth()->user()->unreadNotifications()->latest()->get();
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
                return redirect('taste-maker-profile#edit-profile')
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


    /**
     * @param FormRequest $request
     * @return JsonResponse
     * @return update merchant seetings
     */
    public function storeCuratorTag(AddTagCuratorRequest $request): JsonResponse
    {
        $CuratorFeatureTag = $this->_filterCuratorTagRequest($request);

        try {
            $response = CuratorFeatureTag::create($CuratorFeatureTag);

            if($response)
                return response()->json([
                    'success' => IMessageTemplates::STORECURATORTAG
                ]);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }

    }




    private function _filterCuratorTagRequest($request):array
    {
        return [
            'curator_feature_id' => $request->curator_feature_id,
            'name' => $request->name,
        ];
    }
    // forCurators
    public function forCurators()
    {
        $classifiedImg = public_path('images/curator-header.jpg');
        Image::make($classifiedImg)->encode('webp', 90)->save(public_path('images/'  .  'curator-header.webp'));

        return view('pages.curators.curator-details');
    }

    /**
     * @param FormRequest $request
     * @return JsonResponse
     * @return update merchant seetings
     */
    public function deleteCuratorTag(Request $request)
    {

        if(!empty($request->feature_id))
        {
            $recor_exist = CuratorFeatureTag::where('id',$request->feature_id)->first();
            $recor_exist->delete();
            return response()->json([
                'success' => IMessageTemplates::DELETECURATORTAG
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function curatorChangePassword(Request $request)
    {

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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}

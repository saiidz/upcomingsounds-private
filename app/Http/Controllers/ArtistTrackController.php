<?php

namespace App\Http\Controllers;

use App\Http\Requests\Artist\StoreTrackRequest;
use App\Models\ArtistTrack;
use App\Models\ArtistTrackLanguage;
use App\Models\CuratorFeature;
use App\Models\CuratorFeatureTag;
use App\Rules\ValidateArrayLinkTrack;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\TrackCategory;
use App\Models\ArtistTrackLink;
use App\Models\Language;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ArtistTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'audio'           => ($request->demo == "on") ? 'required|file|mimes:mp3|max:15000' :'file|mimes:mp3|max:15000',
            'tag'             => 'required',
            'track_thumbnail' => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
            'link.*'          =>  'required',
            'release_type'    => 'required',
            'description'     => 'required|string',
            'name'            => 'required|string',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($request->link))
        {
            foreach ($request->link as $link)
            {
                $check_link = str_contains($link, 'iframe') ? true : false;
                if ($check_link == false)
                {
                    return response()->json(['error' => 'Please add iframe links not other links.']);
                }
            }
        }

        $input = $request->all();

        $input['user_id'] = auth()->user()->id;
        // $input['youtube_soundcloud_url'] = $request->get('youtube_soundcloud_url');
        // $input['soundcloudUrl']          = $request->get('soundcloudUrl');
//        $input['track_category_id'] = ($request->get('song_category')) ? $request->get('song_category') : null;
        $input['display_profile'] = ($request->get('display_profile')) ? (int)$request->get('display_profile') : 0;

        // add audio
        $path = public_path().'/uploads/audio';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // upload audio song
        if ($request->file('audio')) {
            $file = $request->file('audio');
            $name = $file->getClientOriginalName();
            $audio_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/audio/', $audio_path);
            //store audio file into directory and db
            $input['audio'] = $audio_path;
        }


        $path = public_path().'/uploads/track_thumbnail';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // upload track song
//        if ($request->hasfile('track_thumbnail')) {
        if ($request->file('track_thumbnail')) {
            $file = $request->file('track_thumbnail');
            $name = $file->getClientOriginalName();
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/track_thumbnail/', $image_path);
            //store image file into directory and db
            $input['track_thumbnail'] = $image_path;
        }
        $track = ArtistTrack::create($input);

        // create artist track links
        if(!empty($request->link))
        {
            foreach($request->link as $link)
            {
                ArtistTrackLink::create([
                    'artist_track_id' => $track->id,
                    'link' => $link,
                ]);
            }
        }

        // create artist track language
        if(!empty($request->language))
        {
            foreach($request->language as $language)
            {
                ArtistTrackLanguage::create([
                    'artist_track_id' => $track->id,
                    'language_id' => $language,
                ]);
            }
        }

        // track tags store
        if(!empty($request->tag)){
            foreach($request->tag as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        return response()->json(['success' => 'Song Track created successfully.']);
//        return redirect()->back()->with('success', 'Song Track created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ArtistTrack $artist_track)
    {
        $track_categories = TrackCategory::all();
        return response()->json([
            'artist_track' => $artist_track,
            'track_categories' => $track_categories,
            'success' => 'Artist Track Get Successfully',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(ArtistTrack $artist_track)
    {
        $track_categories = TrackCategory::all();
        $selected_language = !empty($artist_track->artistTrackLanguages) ? $artist_track->artistTrackLanguages->pluck('language_id')->toArray() : '';
        $newLanguageArray = [];
        $languages = Language::get(['id','name'])->toArray();
        foreach ($languages as $language)
        {
            $language_new = [
                'value' => $language['id'],
                'label' => $language['name'],
                'selected' => in_array($language['id'],$selected_language) ? true : false,
            ];
            array_push($newLanguageArray, $language_new);
        }

        // all curator features
        $new_curator_features = [];
        $selected_curator_features = !empty($artist_track->artistTrackTags) ? $artist_track->artistTrackTags->pluck('curator_feature_tag_id')->toArray() : '';
        $curator_features_ids = CuratorFeature::pluck('id')->toArray();
        $curator_featuress = CuratorFeatureTag::with('curatorFeature')->whereHas('curatorFeature', function($q){
                                    $q->select('name');
                                })->whereIn('curator_feature_id', $curator_features_ids)->get()
                                    ->groupBy('curatorFeature.name');

        foreach ($curator_featuress as $curator_feature_name => $curator_features)
        {

//            foreach ($curator_features as $curator_feature)
//            {
//
//
//                array_push($new_curator_features, $curator_features_new);
//            }

        }
//        dd($new_curator_features);

        return response()->json([
            'artist_track'           => $artist_track,
            'artist_track_links'     => !empty($artist_track->artistTrackLinks) ? $artist_track->artistTrackLinks : '',
            'track_categories'       => $track_categories,
            'selected_languages'     => $newLanguageArray,
            'success'                => 'Artist Track Get Successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ArtistTrack $artist_track)
    {
         dd($request->all());
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        // $input['youtube_soundcloud_url'] = $request->get('youtube_soundcloud_url');
        // $input['soundcloudUrl']          = $request->get('soundcloudUrl');
        $input['display_profile']        = ($request->get('display_profile')) ? (int)$request->get('display_profile') : 0;

        // upload audio song
        if ($request->hasfile('audio')) {
            $file = $request->file('audio');
            $name = $file->getClientOriginalName();
            $audio_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/audio/', $audio_path);
            //store audio file into directory and db
            $input['audio'] = $audio_path;
        }else{
            $input['audio'] = $artist_track->audio;
        }

        // upload track song
        if ($request->hasfile('track_thumbnail')) {
            $file = $request->file('track_thumbnail');
            $name = $file->getClientOriginalName();
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/track_thumbnail/', $image_path);
            //store image file into directory and db
            $input['track_thumbnail'] = $image_path;
        }else{
            $input['track_thumbnail'] = $artist_track->track_thumbnail;
        }

        // create artist track links
        if(!empty($request->link))
        {
            // delete previous track link
            $artist_track_link = ArtistTrackLink::where('artist_track_id',$artist_track->id)->pluck('artist_track_id')->toArray();

            if(isset($artist_track_link))
            {
                ArtistTrackLink::whereIn('artist_track_id',$artist_track_link)->forceDelete();
            }

            foreach($request->link as $link)
            {
                ArtistTrackLink::create([
                    'artist_track_id' => $artist_track->id,
                    'link' => $link,
                ]);
            }
        }

        $artist_track->update($input);
        return redirect()->back()->with('success', 'Song Track updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ArtistTrack $artist_track)
    {
        if(!empty($artist_track->audio))
        {
            $audio = public_path('uploads/audio/' . $artist_track->audio);
            if(file_exists($audio)) {
                unlink($audio);
            }
        }

        if(!empty($artist_track->track_thumbnail))
        {
            $image = public_path('uploads/track_thumbnail/' . $artist_track->track_thumbnail);
            if(file_exists($image)) {
                unlink($image);
            }
        }

        $artist_track->delete();
        return response()->json([
            'success' => 'Track are deleted!',
        ]);
    }

    /**
     * requestTrackEdit function
     *
     * @return void
     */

    public function requestTrackEdit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $artist_track = ArtistTrack::where('id', $request->track_id)->first();
        if(!empty($artist_track))
        {
//            $artist_track->update([
//                'is_approved' => 1,
//                'is_rejected' => 0,
//            ]);

            $data['trackID'] = $artist_track->id;
            $data['email'] = $artist_track->user->email;
            $data['username'] = $artist_track->user->name;
            $data["title"] = "Request to Edit Track Admin";
            $data['requestEditTrackAdmin'] = $request->description_details ?? null;

            try {
                Mail::send('pages.artists.emails.send_request_to_edit_email_admin', $data, function($message)use($data) {
                    $message->from($data["email"], $data["email"]);
                    $message->to('admin@edmrekords.com')
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
        return response()->json(['success' => 'Email send successfully and send to Admin.']);
    }
}

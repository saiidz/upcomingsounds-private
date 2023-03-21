<?php

namespace App\Http\Controllers;

use App\Http\Requests\Artist\AddYourTrackRequest;
use App\Http\Requests\Artist\StoreTrackRequest;
use App\Http\Requests\Artist\UpdateTrackRequest;
use App\Models\ArtistTrack;
use App\Models\ArtistTrackImage;
use App\Models\ArtistTrackLanguage;
use App\Models\ArtistTrackTag;
use App\Models\CuratorFeature;
use App\Models\CuratorFeatureTag;
use App\Rules\ValidateArrayLinkTrack;
use App\Templates\IMessageTemplates;
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
    public function store(AddYourTrackRequest $request)
    {
//        $validator = Validator::make($request->all(), [
//            'audio'           => ($request->demo == "on") ? 'required|file|mimes:mp3|max:15000' :'file|mimes:mp3|max:15000',
//            'tag'             => 'required',
//            'track_images.*'  => 'file|mimes:jpeg,jpg,png,pdf|max:2048',
//            'track_thumbnail' => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
//            'link.*'          =>  'required',
//            'release_type'    => 'required',
//            'description'     => 'required|string',
//            'name'            => 'required|string',
//        ]);
//
//        if ($validator->fails())
//        {
//            return response()->json(['errors' => $validator->errors()->all()]);
//        }

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
        $input['display_profile'] = ($request->get('display_profile')) ? (int)$request->get('display_profile') : 0;

        // add audio
        $path = public_path().'/uploads/audio';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // upload audio song
        if ($request->file('audio')) {
            $file = $request->file('audio');
            $name = str_replace(' ', '', $file->getClientOriginalName());
//            $name = str_replace(' ', '', $file->getClientOriginalName());
            $audio_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/audio/', $audio_path);
            //store audio file into directory and db
            $input['audio'] = $audio_path;
        }


        $path = public_path().'/uploads/track_thumbnail';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // upload track_thumbnail
//        if ($request->hasfile('track_thumbnail')) {
        if ($request->file('track_thumbnail')) {
            $file = $request->file('track_thumbnail');
            $name = str_replace(' ', '', $file->getClientOriginalName());
//            $name = str_replace(' ', '', $file->getClientOriginalName());
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/track_thumbnail/', $image_path);
            //store image file into directory and db
            $input['track_thumbnail'] = $image_path;
        }
        $track = ArtistTrack::create($input);



        // upload multiple images
        $path = public_path().'/uploads/track_images';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }

        if ($request->hasFile('track_images')) {
            foreach ($request->file('track_images') as $file){
                $type = explode('/',$file->getClientMimeType());

                $name = str_replace(' ', '', $file->getClientOriginalName());
                $image_path = 'default_'.time().$name;
                $file->move(public_path() . '/uploads/track_images/', $image_path);
                //store image file into directory and db
                $input['artist_track_id'] = $track->id;
                $input['path'] = $image_path;
                $input['type'] = !empty($type[1]) ? $type[1] : null;

                $track->artistTrackImages()->create($input);
            }
        }


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

        if(!empty($request->promote) && $request->promote == "true")
        {
            return response()->json([
                'success' => 'Song Track created successfully. Please wait for approval from admin side.',
                'promote' => IMessageTemplates::PROMOTE_ADD_TRACK,
            ]);
        }else{
            return response()->json(['success' => 'Song Track created successfully. Please wait for approval from admin side.']);
        }
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
            $new_curator_features[$curator_feature_name] = [];
            foreach ($curator_features as $curator_feature)
            {
                $selected_curator_new = [
                    'value' => $curator_feature['id'],
                    'label' => $curator_feature['name'],
                    'selected' => in_array($curator_feature['id'],$selected_curator_features) ? true : false,
                ];

                array_push($new_curator_features[$curator_feature_name], $selected_curator_new);
            }
        }

        return response()->json([
            'artist_track'           => $artist_track,
            'artist_track_links'     => !empty($artist_track->artistTrackLinks) ? $artist_track->artistTrackLinks : '',
            'artist_track_images'    => !empty($artist_track->artistTrackImages) ? $artist_track->artistTrackImages : '',
            'selected_languages'     => $newLanguageArray,
            'new_curator_features'   => $new_curator_features,
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
    public function update(UpdateTrackRequest $request,ArtistTrack $artist_track)
    {
//        $validator = Validator::make($request->all(), [
//            'audio_cover'     => 'required',
//            'audio'           => ($request->demo == "on") ? 'file|mimes:mp3|max:15000' :'file|mimes:mp3|max:15000',
//            'tag'             => 'required',
//            'track_thumbnail' => 'file|mimes:jpeg,jpg,png,gif|max:2048',
//            'link.*'          =>  'required',
//            'release_type'    => 'required',
//            'description'     => 'required|string',
//            'name'            => 'required|string',
//        ]);
//
//        if ($validator->fails())
//        {
//            return response()->json(['errors' => $validator->errors()->all()]);
//        }

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
        $input['display_profile']        = ($request->get('display_profile')) ? (int)$request->get('display_profile') : 0;

        // upload audio song
        if ($request->hasfile('audio')) {
            // delete audio previous
            if(!empty($artist_track->audio))
            {
                $audio = public_path('uploads/audio/' . $artist_track->audio);
                if(file_exists($audio)) {
                    unlink($audio);
                }
            }

            $file = $request->file('audio');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $audio_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/audio/', $audio_path);
            //store audio file into directory and db
            $input['audio'] = $audio_path;
        }else{
            $input['audio'] = $artist_track->audio;
        }

        // upload track song
        if ($request->hasfile('track_thumbnail')) {
            // delete thumbnail previous
            if(!empty($artist_track->track_thumbnail))
            {
                $image = public_path('uploads/track_thumbnail/' . $artist_track->track_thumbnail);
                if(file_exists($image)) {
                    unlink($image);
                }
            }

            $file = $request->file('track_thumbnail');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/track_thumbnail/', $image_path);
            //store image file into directory and db
            $input['track_thumbnail'] = $image_path;
        }else{
            $input['track_thumbnail'] = $artist_track->track_thumbnail;
        }

        // upload multiple images

        if ($request->hasFile('track_images')) {
            foreach ($request->file('track_images') as $file){
                $type = explode('/',$file->getClientMimeType());

                $name = str_replace(' ', '', $file->getClientOriginalName());
                $image_path = 'default_'.time().$name;
                $file->move(public_path() . '/uploads/track_images/', $image_path);
                //store image file into directory and db
                $input['artist_track_id'] = $artist_track->id;
                $input['path'] = $image_path;
                $input['type'] = !empty($type[1]) ? $type[1] : null;

                $artist_track->artistTrackImages()->create($input);
            }
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

        // create artist track language
        if(!empty($request->language))
        {
            // delete previous track language
            $artist_track_language = ArtistTrackLanguage::where('artist_track_id',$artist_track->id)->pluck('artist_track_id')->toArray();

            if(isset($artist_track_language))
            {
                ArtistTrackLanguage::whereIn('artist_track_id',$artist_track_language)->forceDelete();
            }

            foreach($request->language as $language)
            {
                ArtistTrackLanguage::create([
                    'artist_track_id' => $artist_track->id,
                    'language_id' => $language,
                ]);
            }
        }

        // track tags store
        if(!empty($request->tag))
        {
            // delete previous track tag
            $artist_track_tag = ArtistTrackTag::where('artist_track_id',$artist_track->id)->pluck('artist_track_id')->toArray();

            if(isset($artist_track_tag))
            {
                ArtistTrackTag::whereIn('artist_track_id',$artist_track_tag)->forceDelete();
            }

            foreach($request->tag as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $artist_track->artistTrackTags()->create($input);
            }
        }

        $artist_track->update($input);
        return response()->json(['success' => 'Song Track updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ArtistTrack $artist_track)
    {
        //audio delete
        if(!empty($artist_track->audio))
        {
            $audio = public_path('uploads/audio/' . $artist_track->audio);
            if(file_exists($audio)) {
                unlink($audio);
            }
        }

        //track_thumbnail delete
        if(!empty($artist_track->track_thumbnail))
        {
            $image = public_path('uploads/track_thumbnail/' . $artist_track->track_thumbnail);
            if(file_exists($image)) {
                unlink($image);
            }
        }

        //artistTrackImages delete
        if(!empty($artist_track->artistTrackImages))
        {
            foreach ($artist_track->artistTrackImages as $artistTrackImage)
            {
                $path = public_path('uploads/track_images/' . $artistTrackImage->path);
                if(file_exists($path)) {
                    unlink($path);
                }
            }
            $artist_track->artistTrackImages()->forceDelete();
        }

        //artistTrackLanguages delete
        if(!empty($artist_track->artistTrackLanguages))
        {
            $artist_track->artistTrackLanguages()->delete();
        }

        //artistTrackLinks delete
        if(!empty($artist_track->artistTrackLinks))
        {
            $artist_track->artistTrackLinks()->forceDelete();
        }

        //artistTrackTags delete
        if(!empty($artist_track->artistTrackTags))
        {
            $artist_track->artistTrackTags()->delete();
        }

        //$artist_track delete
        $artist_track->forceDelete();
        return response()->json([
            'success' => 'Track deleted! successfully',
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
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
            $artist_track->update([
                'request_edit_des' => $request->description_details ?? null,
            ]);

            $data['trackID'] = $artist_track->id;
            $data['email'] = $artist_track->user->email;
            $data['username'] = $artist_track->user->name;
            $data["title"] = "Request to Edit Track Admin";
            $data['requestEditTrackAdmin'] = $request->description_details ?? null;

            try {
                Mail::send('pages.artists.emails.send_request_to_edit_email_admin', $data, function($message)use($data) {
                    $message->from($data["email"], $data["email"]);
                    $message->to('admin@upcomigspunds.com')
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
        return response()->json(['success' => 'Email send successfully and send to Admin.']);
    }

    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function destroyImgPdf(Request $request)
    {

        if(!empty($request->img_pdf_id))
        {
            $record_exist = ArtistTrackImage::where('id',$request->img_pdf_id)->first();
            if(!empty($record_exist))
            {
                $path = public_path('uploads/track_images/' . $record_exist->path);
                if(file_exists($path)) {
                    unlink($path);
                }
            }
            $record_exist->forceDelete();
            return response()->json([
                'success' => IMessageTemplates::DELETEIMGPDF
            ]);
        }
    }
}

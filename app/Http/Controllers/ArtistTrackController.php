<?php

namespace App\Http\Controllers;

use App\Models\ArtistTrack;
use Illuminate\Http\Request;
use App\Models\TrackCategory;
use App\Models\ArtistTrackLink;
use Illuminate\Support\Facades\File;
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
            // 'youtube_soundcloud_url' => 'required',
            // 'spotify_track_url' => 'required|url',
            // 'link' => 'required|url',
            'name' => 'required|string',
            'description' => 'required|string',
            'track_thumbnail' => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
            'audio' =>'required|file|mimes:mp3|max:15000',
            'tag'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/artist-profile#add-track')->withErrors($validator)
                ->withInput();
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

        // track tags store
        if(!empty($request->tag)){
            foreach($request->tag as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        return redirect()->back()->with('success', 'Song Track created successfully.');
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
        return response()->json([
            'artist_track'       => $artist_track,
            'artist_track_links' => !empty($artist_track->artistTrackLinks) ? $artist_track->artistTrackLinks : '',
            'track_categories'   => $track_categories,
            'success'            => 'Artist Track Get Successfully',
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

        // delete previous track link
        $artist_track_link = ArtistTrackLink::where('artist_track_id',$artist_track->id)->pluck('artist_track_id')->toArray();

        if(isset($artist_track_link))
        {
            ArtistTrackLink::whereIn('artist_track_id',$artist_track_link)->forceDelete();
        }

        // create artist track links
        if(!empty($request->link))
        {
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
}

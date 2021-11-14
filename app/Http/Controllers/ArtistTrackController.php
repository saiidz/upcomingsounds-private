<?php

namespace App\Http\Controllers;

use App\Models\ArtistTrack;
use App\Models\TrackCategory;
use Illuminate\Http\Request;
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
            'youtube_soundcloud_url' => 'required',
            'spotify_track_url' => 'required|url',
            'name' => 'required|string',
            'description' => 'required|string',
            'song_category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['youtube_soundcloud_url'] = $request->get('youtube_soundcloud_url');
        $input['track_category_id'] = ($request->get('song_category')) ? $request->get('song_category') : null;
        $input['display_profile'] = ($request->get('display_profile')) ? (int)$request->get('display_profile') : 0;

        $path = public_path().'/uploads/track_thumbnail';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // upload track song
        dd($request->file('track_photo'));
        if ($request->hasfile('track_thumbnail')) {
            $file = $request->file('track_thumbnail');
            $name = $file->getClientOriginalName();
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/track_thumbnail/', $image_path);
            //store image file into directory and db
            $input['track_thumbnail'] = $image_path;
        }
        ArtistTrack::create($input);
        return redirect()->back()->with('success', 'Song Track created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(ArtistTrack $artist_track)
    {
        $track_categories = TrackCategory::all();
        return response()->json([
            'artist_track' => $artist_track,
            'track_categories' => $track_categories,
            'success' => 'Artist Track Get Successfully',
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
        $input['youtube_soundcloud_url'] = $request->get('youtube_soundcloud_url');
        $input['track_category_id'] = ($request->get('song_category')) ? $request->get('song_category') : null;
        $input['display_profile'] = ($request->get('display_profile')) ? (int)$request->get('display_profile') : 0;

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
        $artist_track->delete();
        return response()->json([
            'success' => 'Track are deleted!',
        ]);
    }
}

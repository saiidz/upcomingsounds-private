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
            'tag_would_love'  => 'min:3|max:3',
            'tag_alternative'  => 'min:3|max:3',
            'tag_blogwave'  => 'min:3|max:3',
            'tag_classic'  => 'min:3|max:3',
            'tag_classical_jazz'  => 'min:3|max:3',
            'tag_EDM'  => 'min:3|max:3',
            'tag_electronica'  => 'min:3|max:3',
            'tag_folk'  => 'min:3|max:3',
            'tag_hip_hop'  => 'min:3|max:3',
            'tag_house'  => 'min:3|max:3',
            'tag_idm'  => 'min:3|max:3',
            'tag_metal_hard_Rock'  => 'min:3|max:3',
            'tag_other'  => 'min:3|max:3',
            'tag_pop'  => 'min:3|max:3',
            'tag_punk'  => 'min:3|max:3',
            'tag_rnb'  => 'min:3|max:3',
            'tag_world_music'  => 'min:3|max:3',
            'tag_classic_instrumental'  => 'min:3|max:3',
            'tag_electronic'  => 'min:3|max:3',
            'tag_folk_acoustic'  => 'min:3|max:3',
            'tag_jazz'  => 'min:3|max:3',
            'tag_metal'  => 'min:3|max:3',
            'tag_pop_new'  => 'min:3|max:3',
            'tag_popular_music'  => 'min:3|max:3',
        ]);

        if ($validator->fails()) {
            return redirect('/artist-profile#add-track')->withErrors($validator)
                ->withInput();
        }
//dd($request->all());

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

        // track tags store
        if(!empty($request->tag_would_love)){
            foreach($request->tag_would_love as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_alternative)){
            foreach($request->tag_alternative as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_blogwave)){
            foreach($request->tag_blogwave as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_classic)){
            foreach($request->tag_classic as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_classical_jazz)){
            foreach($request->tag_classical_jazz as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_EDM)){
            foreach($request->tag_EDM as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_electronica)){
            foreach($request->tag_electronica as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_folk)){
            foreach($request->tag_folk as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_hip_hop)){
            foreach($request->tag_hip_hop as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_house)){
            foreach($request->tag_house as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_idm)){
            foreach($request->tag_idm as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_metal_hard_Rock)){
            foreach($request->tag_metal_hard_Rock as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_other)){
            foreach($request->tag_other as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_pop)){
            foreach($request->tag_pop as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_punk)){
            foreach($request->tag_punk as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_rnb)){
            foreach($request->tag_rnb as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_world_music)){
            foreach($request->tag_world_music as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_classic_instrumental)){
            foreach($request->tag_classic_instrumental as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_electronic)){
            foreach($request->tag_electronic as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_folk_acoustic)){
            foreach($request->tag_folk_acoustic as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_jazz)){
            foreach($request->tag_jazz as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_metal)){
            foreach($request->tag_metal as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_pop_new)){
            foreach($request->tag_pop_new as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        if(!empty($request->tag_popular_music)){
            foreach($request->tag_popular_music as $tag)
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
        $image = public_path('uploads/track_thumbnail/' . $artist_track->track_thumbnail);
        if(file_exists($image)) {
            unlink($image);
        }
        $artist_track->delete();
        return response()->json([
            'success' => 'Track are deleted!',
        ]);
    }
}

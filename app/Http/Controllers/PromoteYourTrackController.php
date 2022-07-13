<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use App\Models\ArtistTrack;
use Illuminate\Http\Request;
use App\Models\CuratorFeature;
use App\Models\ArtistTrackLink;
use App\Models\PromoteYourTrack;
use Illuminate\Http\JsonResponse;
use App\Models\ArtistTrackLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Artist\AddYourTrackRequest;

class PromoteYourTrackController extends Controller
{
    /**
     * PromoteYourTrack index
     */
    public function index(Request $request)
    {
        $user_artist = Auth::user();
        $page = 'promote-your-track';
        return view('pages.artists.artist-promote-your-track.promote-your-track',get_defined_vars());
    }
    /**
     * PromoteYourTrack index
     */
    public function addYourTrack(Request $request)
    {
        $page = 'add-your-track';
        $user_artist = Auth::user();
        $artist_tracks = ArtistTrack::where('user_id',$user_artist->id)->latest()->get();
        $languages = Language::all();
        $curator_features = CuratorFeature::all();
        return view('pages.artists.artist-promote-your-track.add-your-track',get_defined_vars());
    }

    /**
     * storeTrackCampaign
     */
    public function storeTrackCampaign(Request $request)
    {
        $page = 'add-your-track';
        $user_artist = Auth::user();
        $artist_tracks = ArtistTrack::where('user_id',$user_artist->id)->orderBy('id','desc')->get();

        return view('pages.artists.artist-promote-your-track.add-your-track',get_defined_vars());
    }

    /**
     * getCurators
     */
    public function getCurators(Request $request)
    {

        if($request->recieved_check == 1)
        {
            $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                $q->whereIn('curator_signup_from',['sound_expert_producer','brooker_booking','monitor_publisher_synch']);
            })->getReceivedCurstors()->latest()->get();

            return response()->json([
                'success' => 'we have '.$curators->count().' curators',
                'curators' => $curators,
            ]);
        }elseif($request->visibility_check == 2)
        {
            $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                $q->whereIn('curator_signup_from',['playlist_curator','influencer','youtube_channel','radio_tv']);
            })->getReceivedCurstors()->latest()->get();
            return response()->json([
                'success' => 'we have '.$curators->count().' curators',
                'curators' => $curators,
            ]);
        }elseif($request->establish_check == 3)
        {
            $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                $q->whereIn('curator_signup_from',['journalist_media','label_manager','media']);
            })->getReceivedCurstors()->latest()->get();
            return response()->json([
                'success' => 'we have '.$curators->count().' curators',
                'curators' => $curators,
            ]);
        }

        if(!empty($request->right_now_check))
        {
            if($request->right_now_check == 'right_now_check')
            {
                if($request->right_now_id == 1)
                {
                    $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                        $q->whereIn('curator_signup_from',['sound_expert_producer','brooker_booking','monitor_publisher_synch']);
                    })->getReceivedCurstors()->latest()->get();

                    return response()->json([
                        'success' => 'we have '.$curators->count().' curators',
                        'curators' => $curators,
                    ]);
                }elseif($request->right_now_id == 2)
                {
                    $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                        $q->whereIn('curator_signup_from',['playlist_curator','influencer','youtube_channel','radio_tv']);
                    })->getReceivedCurstors()->latest()->get();
                    return response()->json([
                        'success' => 'we have '.$curators->count().' curators',
                        'curators' => $curators,
                    ]);
                }elseif($request->right_now_id == 3)
                {
                    $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                        $q->whereIn('curator_signup_from',['journalist_media','label_manager','media']);
                    })->getReceivedCurstors()->latest()->get();
                    return response()->json([
                        'success' => 'we have '.$curators->count().' curators',
                        'curators' => $curators,
                    ]);
                }
            }
        }

        // return false;
        // $page = 'add-your-track';
        // $user_artist = Auth::user();
        // $artist_tracks = ArtistTrack::where('user_id',$user_artist->id)->orderBy('id','desc')->get();

        // return view('pages.artists.artist-promote-your-track.add-your-track',get_defined_vars());
    }

    /**
     * @param storeAddTrack $request
     * @return JsonResponse
     */
    public function storeAddTrack(AddYourTrackRequest $request): JsonResponse
    {
        //check if demo on
        if($request->demo == "on")
        {
            if(empty($request->audio))
            {
                return response()->json(['error' => 'Please add song because demo is on']);
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

        return response()->json('Song Track created successfully.');
    }
}

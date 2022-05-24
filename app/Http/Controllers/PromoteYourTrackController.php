<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ArtistTrack;
use Illuminate\Http\Request;
use App\Models\PromoteYourTrack;
use Illuminate\Support\Facades\Auth;

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

        return view('pages.artists.artist-promote-your-track.add-your-track',get_defined_vars());
    }

    /**
     * storeTrackCampaign
     */
    public function storeTrackCampaign(Request $request)
    {
        dd($request->all());
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
        // return false;
        // $page = 'add-your-track';
        // $user_artist = Auth::user();
        // $artist_tracks = ArtistTrack::where('user_id',$user_artist->id)->orderBy('id','desc')->get();

        // return view('pages.artists.artist-promote-your-track.add-your-track',get_defined_vars());
    }
}

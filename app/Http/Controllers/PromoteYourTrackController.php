<?php

namespace App\Http\Controllers;

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
        return view('pages.artists.artist-promote-your-track.promote-your-track',compact('user_artist','page'));
    }
    /**
     * PromoteYourTrack index
     */
    public function addYourTrack(Request $request)
    {
        $page = 'add-your-track';
        $user_artist = Auth::user();
        $artist_tracks = ArtistTrack::where('user_id',$user_artist->id)->orderBy('id','desc')->get();

        return view('pages.artists.artist-promote-your-track.add-your-track',compact('user_artist','page','artist_tracks'));
    }
}

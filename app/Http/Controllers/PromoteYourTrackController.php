<?php

namespace App\Http\Controllers;

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
        return view('pages.artists.artist-promote-your-track.promote-your-track',compact('user_artist'));
    }
}

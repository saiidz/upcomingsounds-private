<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    public function artistProfile(){
        $user_artist = Auth::user();
        return view('pages.artists.artist-profile',compact('user_artist'));
    }
}

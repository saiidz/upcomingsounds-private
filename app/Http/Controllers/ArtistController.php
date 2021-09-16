<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Artist
     */
    public function index(Request $request)
    {
        return view('pages.artists.artist-home');
    }
}

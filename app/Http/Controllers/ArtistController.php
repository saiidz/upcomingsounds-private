<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Artist Home
     */
    public function index()
    {
        return view('pages.artists.artist-home');
    }
    /**
     * Artists
     */
    public function artists()
    {
        return view('pages.artists.artists_details');
    }
}

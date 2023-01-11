<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SavedArtistController extends Controller
{
    public function savedArtist()
    {
        return view('pages.curators.artist-saved.saved', get_defined_vars());
    }
}

<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\CuratorFavoriteArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedArtistController extends Controller
{
    public function savedArtist()
    {
        $savedArtists = CuratorFavoriteArtist::where('curator_id',Auth::id())->latest()->get();
        return view('pages.curators.artist-saved.saved', get_defined_vars());
    }
}

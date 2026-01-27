<?php
namespace App\Http\Controllers\Artist;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ArtistTrack;
use App\Models\Genre;
class OfferController extends Controller {
    public function offers() {
        $user = auth()->user();
        $artist_tracks = ArtistTrack::where('user_id', $user->id)->get();
        $genres = Genre::all();
        $box = []; $flag = ""; $pos = 0; // The 2024 design variables
        return view('pages.artists.artist-track.index', get_defined_vars());
    }
}

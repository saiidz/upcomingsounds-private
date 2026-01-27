<?php
namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ArtistTrack;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Country;
use App\Models\CuratorFeature;
use Illuminate\Http\Request;

class OfferController extends Controller {
    public function offers() {
        $user = auth()->user();
        if (!$user) return redirect()->route('login');

        // Fetch tracks
        $artist_tracks = ArtistTrack::where('user_id', $user->id)->latest()->get();
        
        // Safety fetch: Prevents 500 error if tables are missing or empty
        try { $genres = Genre::all(); } catch (\Exception $e) { $genres = collect(); }
        try { $languages = Language::all(); } catch (\Exception $e) { $languages = collect(); }
        try { $features = CuratorFeature::all(); } catch (\Exception $e) { $features = collect(); }
        
        $notifications = $user->notifications()->latest()->get();
        $unReadNotifications = $user->unreadNotifications()->latest()->get();

        // Safety Variables for the 2024 Layout design
        $box = []; $flag = ""; $mystring = ""; $pos = 0;
        $poshttp = ""; $poshttps = ""; $findhttp = ""; $findhttps = "";
        
        return view('pages.artists.artist-track.index', get_defined_vars());
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    /**
     * approvedArtist function
     *
     * @return void
     */

    public function approvedArtist()
    {
        $approved_artists = User::GetApprovedArtists()->latest()->get();
        return view('admin.pages.artists.artist_approved', get_defined_vars());
    }

     /**
     * approvedArtist function
     *
     * @return void
     */

    public function pendingArtist()
    {
        $pending_artists = User::GetPendingArtists()->latest()->get();
        return view('admin.pages.artists.artist_pending', get_defined_vars());
    }

    /**
     * profileArtist function
     *
     * @return void
     */

    public function profileArtist(User $user)
    {
        // dd($user);
        return view('admin.pages.artists.artist_view', get_defined_vars());
    }
}

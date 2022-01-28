<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistWalletController extends Controller
{
    /**
     * shop
     */
    public function wallet()
    {
        return view('pages.artists.artist-wallet.wallet');
    }
}

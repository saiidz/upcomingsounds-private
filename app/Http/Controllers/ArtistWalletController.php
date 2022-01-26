<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistWalletController extends Controller
{
    /**
     * shop
     */
    public function shop()
    {
        return view('pages.artists.artist-wallet.shop');
    }
}

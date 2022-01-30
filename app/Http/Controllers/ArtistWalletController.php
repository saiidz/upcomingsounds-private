<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;

class ArtistWalletController extends Controller
{
    /**
     * shop
     */
    public function wallet()
    {
        $stripe = new StripeClient(Config('services.stripe.secret'));
        $products =  $stripe->prices->all(['product' => 'prod_L21JVzBAJvcxEH']);
//        $products = $stripe->prices->all();
//        dd($products);
        return view('pages.artists.artist-wallet.wallet');
    }
}

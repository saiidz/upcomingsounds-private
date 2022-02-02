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

        // Standard package
        $standard_products =  $stripe->prices->all(['product' => 'prod_L1zUPPaOgM1c6X']);

        // Plus package
        $plus_products =  $stripe->prices->all(['product' => 'prod_L2146ETp1Ff9j1']);

        // Most popular package
        $most_popular_products =  $stripe->prices->all(['product' => 'prod_L219VceVVRqZgN']);

        // Premium package
        $premium_products =  $stripe->prices->all(['product' => 'prod_L21E6DBKjpt0Ya']);

        // Platinum package
        $platinum_products =  $stripe->prices->all(['product' => 'prod_L21JVzBAJvcxEH']);


//        $numberss = number_format($number / 100, 2);

        return view('pages.artists.artist-wallet.wallet', get_defined_vars());
    }
}

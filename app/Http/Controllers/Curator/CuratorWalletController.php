<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CuratorWalletController extends Controller
{
    /**
     * shop
     */
    public function wallet()
    {
        $countries = Country::all();
        return view('pages.curators.curator-wallet.wallet',get_defined_vars());
    }

}

<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function offers()
    {
        return view('pages.artists.artist-offers.offers', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function pending()
    {
        return view('pages.artists.artist-offers.pending', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function accepted()
    {
        return view('pages.artists.artist-offers.accepted', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function rejected()
    {
        return view('pages.artists.artist-offers.rejected', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function alternative()
    {
        return view('pages.artists.artist-offers.alternative', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function artistsSubmissions()
    {
        return view('pages.artists.artist-offers.artist-submissions', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function completed()
    {
        return view('pages.artists.artist-offers.completed', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function new()
    {
        return view('pages.artists.artist-offers.new', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function proposition()
    {
        return view('pages.artists.artist-offers.proposition', get_defined_vars());
    }
}

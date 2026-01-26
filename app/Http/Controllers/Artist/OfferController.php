<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use App\Models\CuratorRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const APPROVED = 1;

    public function offers()
    {
        // This logic gathers the data the Blade file needs to loop
        $sendOffers = SendOffer::whereHas('userCurator')
            ->with(['ratings', 'curatorOfferTemplate.offerType'])
            ->where('artist_id', Auth::id())
            ->where('is_approved', self::APPROVED)
            ->latest()
            ->get();

        return view('pages.artists.artist-offers.offers', compact('sendOffers'));
    }

    public function completed()
    {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->with(['ratings', 'sendOfferTransaction'])
            ->where('artist_id', Auth::id())
            ->where('status', 'completed')
            ->latest()
            ->get();

        return view('pages.artists.artist-offers.completed', compact('sendOffers'));
    }
}

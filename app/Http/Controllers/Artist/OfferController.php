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
        $sendOffers = SendOffer::whereHas('userCurator')
            ->with(['ratings', 'curatorOfferTemplate.offerType'])
            ->where('artist_id', Auth::id())
            ->where('is_approved', self::APPROVED)
            ->latest()
            ->get();

        return view('pages.artists.artist-offers.offers', compact('sendOffers'));
    }

    public function pending()
    {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'pending', 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.pending', compact('sendOffers'));
    }

    public function accepted()
    {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->with(['userCurator', 'curatorOfferTemplate.offerType'])
            ->where('artist_id', Auth::id())
            ->whereIn('status', ['accepted', 'delivered'])
            ->where('is_approved', self::APPROVED)
            ->latest()->get();
        return view('pages.artists.artist-offers.accepted', compact('sendOffers'));
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

    // --- ADDED MISSING METHODS ---

    public function rejected()
    {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'rejected', 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.rejected', compact('sendOffers'));
    }

    public function alternative()
    {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'alternative', 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.alternative', compact('sendOffers'));
    }

    public function offerShow($send_offer)
    {
        $send_offer = SendOffer::with(['userCurator', 'curatorOfferTemplate.offerType'])
            ->findOrFail(decrypt($send_offer));
            
        return view('pages.artists.artist-offers.curator-offer-details', compact('send_offer'));
    }
}

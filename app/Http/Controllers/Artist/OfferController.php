<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const APPROVED = 1;

    public function offers() {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.offers', compact('sendOffers'));
    }

    public function pending() {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'pending', 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.pending', compact('sendOffers'));
    }

    public function accepted() {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id()])
            ->whereIn('status', ['accepted', 'delivered'])
            ->where('is_approved', self::APPROVED)
            ->latest()->get();
        return view('pages.artists.artist-offers.accepted', compact('sendOffers'));
    }

    public function completed() {
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'completed', 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.completed', compact('sendOffers'));
    }

    public function rejected() {
        // Simplified query to prevent relationship crashes
        $sendOffers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'rejected'])
            ->latest()->get();
        return view('pages.artists.artist-offers.rejected', compact('sendOffers'));
    }

    public function alternative() {
        // Simplified query to prevent relationship crashes
        $sendOffers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'alternative'])
            ->latest()->get();
        return view('pages.artists.artist-offers.alternative', compact('sendOffers'));
    }

    public function offerShow($send_offer) {
        try {
            $decryptedId = decrypt($send_offer);
            $send_offer = SendOffer::with(['userCurator', 'curatorOfferTemplate.offerType'])->findOrFail($decryptedId);
            return view('pages.artists.artist-offers.curator-offer-details', compact('send_offer'));
        } catch (\Exception $e) {
            // If decryption fails or record isn't found, redirect back with error
            return redirect()->route('artist.offer.index')->with('error', 'Offer not found or invalid link.');
        }
    }
}

<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const APPROVED = 1;

    public function offers() {
        $user_artist = Auth::user();
        $user = $user_artist; // Some layouts use $user, some use $user_artist
        $sendOffers = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.offers', compact('sendOffers', 'user_artist', 'user'));
    }

    public function pending() {
        $user_artist = Auth::user();
        $user = $user_artist;
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'pending', 'is_approved' => self::APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.pending', compact('sendOffers', 'user_artist', 'user'));
    }

    public function accepted() {
        $user_artist = Auth::user();
        $user = $user_artist;
        $sendOffers = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id()])
            ->whereIn('status', ['accepted', 'delivered'])
            ->where('is_approved', self::APPROVED)
            ->latest()->get();

        return view('pages.artists.artist-offers.accepted', compact('sendOffers', 'user_artist', 'user'));
    }

    public function completed() {
        $user_artist = Auth::user();
        $user = $user_artist;
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'completed', 'is_approved' => self::APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.completed', compact('sendOffers', 'user_artist', 'user'));
    }

    public function rejected() {
        $user_artist = Auth::user();
        $user = $user_artist;
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'rejected', 'is_approved' => self::APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.rejected', compact('sendOffers', 'user_artist', 'user'));
    }

    public function alternative() {
        $user_artist = Auth::user();
        $user = $user_artist;
        $sendOffers = SendOffer::whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'alternative', 'is_approved' => self::APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.alternative', compact('sendOffers', 'user_artist', 'user'));
    }

    public function offerShow($send_offer) {
        $user_artist = Auth::user();
        $user = $user_artist;
        try {
            $decryptedId = decrypt($send_offer);
            $send_offer = SendOffer::with(['userCurator', 'curatorOfferTemplate.offerType'])->findOrFail($decryptedId);
            return view('pages.artists.artist-offers.curator-offer-details', compact('send_offer', 'user_artist', 'user'));
        } catch (\Exception $e) {
            return redirect()->route('artist.offer.index')->with('error', 'Offer not found.');
        }
    }
}

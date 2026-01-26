<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const IS_APPROVED = 1;

    /**
     * Unified Context: Ensures layout variables ($user_artist, etc.) 
     * are always present to prevent sidebar crashes.
     */
    private function getDashboardContext($extraData = []) {
        $user = Auth::user();
        $base = [
            'user_artist' => $user,
            'user'        => $user,
            'artist'      => $user,
        ];
        return array_merge($base, $extraData);
    }

    // URL: /artist-offers-dashboard
    public function offers() {
        $offers = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::IS_APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.offers', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // URL: /pending-offer-list
    public function pending() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'pending'])->latest()->get();
        return view('pages.artists.artist-offers.pending', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // URL: /accepted-offer-list
    public function accepted() {
        $offers = SendOffer::where('artist_id', Auth::id())
            ->whereIn('status', ['accepted', 'delivered'])
            ->latest()->get();

        return view('pages.artists.artist-offers.accepted', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // URL: /completed-offer-list
    public function completed() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'completed'])->latest()->get();
        return view('pages.artists.artist-offers.completed', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // URL: /rejected-offer-list
    public function rejected() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'rejected'])->latest()->get();
        return view('pages.artists.artist-offers.rejected', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // URL: /alternative-offer-list
    public function alternative() {
        $offers = SendOffer::where(['artist

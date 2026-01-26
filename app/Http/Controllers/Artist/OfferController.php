<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const IS_APPROVED = 1;

    private function getDashboardContext($extraData = []) {
        $user = Auth::user();
        return array_merge([
            'user_artist' => $user,
            'user'        => $user,
            'artist'      => $user,
        ], $extraData);
    }

    public function offers() {
        $offers = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::IS_APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.offers', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    public function pending() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'pending'])->latest()->get();
        return view('pages.artists.artist-offers.pending', $this->getDashboardContext(['sendOffers' => $offers]));
    }

    public function accepted() {
        $offers = SendOffer::where('artist_id', Auth::id())
            ->whereIn('status', ['accepted', 'delivered'])->latest()->get();
        return view('pages.artists.artist-offers.accepted', $this->getDashboardContext(['sendOffers' => $offers]));
    }

    public function completed() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'completed'])->latest()->get();
        return view('pages.artists.artist-offers.completed', $this->getDashboardContext(['sendOffers' => $offers]));
    }

    public function rejected() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'rejected'])->latest()->get();
        return view('pages.artists.artist-offers.rejected', $this->getDashboardContext(['sendOffers' => $offers]));
    }

    public function alternative() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'alternative'])->latest()->get();
        return view('pages.artists.artist-offers.alternative', $this->getDashboardContext(['sendOffers' => $offers]));
    }

    public function offerShow($send_offer) {
        try {
            $decryptedId = decrypt($send_offer);
            $offer = SendOffer::with(['userCurator', 'curatorOfferTemplate.offerType', 'artistTrack'])->findOrFail($decryptedId);

            // Here we provide the chat variables that the 'right-sidebar-chat' expects
            return view('pages.artists.artist-offers.curator-offer-details', $this->getDashboardContext([
                'send_offer'      => $offer,
                'conversation_id' => null,
                'receiver_id'     => null,
                'messages'        => collect([]), // Empty collection to prevent loop errors
            ]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Offer details could not be loaded.');
        }
    }
}

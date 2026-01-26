<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const IS_APPROVED = 1;

    /**
     * The Global Fixer: This feeds every variable name your layout or sidebar 
     * could possibly ask for. This stops the 500 errors.
     */
    private function getDashboardContext($extraData = []) {
        $user = Auth::user();
        $base = [
            'user_artist'     => $user,
            'user'            => $user,
            'artist'          => $user,
            'conversation_id' => null,
            'receiver_id'     => null,
            'messages'        => collect([]),
        ];
        return array_merge($base, $extraData);
    }

    // URL: /artist-offers
    public function offers() {
        $data = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::IS_APPROVED])
            ->latest()->get();

        // We pass BOTH names ('offers' and 'sendOffers') so the Blade never crashes
        return view('pages.artists.artist-offers.offers', $this->getDashboardContext([
            'offers'      => $data,
            'sendOffers'  => $data
        ]));
    }

    // URL: /pending-offer-list
    public function pending() {
        $data = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'pending'])->latest()->get();
        return view('pages.artists.artist-offers.pending', $this->getDashboardContext([
            'offers'      => $data,
            'sendOffers'  => $data
        ]));
    }

    // URL: /accepted-offer-list
    public function accepted() {
        $data = SendOffer::where('artist_id', Auth::id())
            ->whereIn('status', ['accepted', 'delivered'])->latest()->get();
        return view('pages.artists.artist-offers.accepted', $this->getDashboardContext([
            'offers'      => $data,
            'sendOffers'  => $data
        ]));
    }

    // URL: /completed-offer-list
    public function completed() {
        $data = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'completed'])->latest()->get();
        return view('pages.artists.artist-offers.completed', $this->getDashboardContext([
            'offers'      => $data,
            'sendOffers'  => $data
        ]));
    }

    // URL: /rejected-offer-list
    public function rejected() {
        $data = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'rejected'])->latest()->get();
        return view('pages.artists.artist-offers.rejected', $this->getDashboardContext([
            'offers'      => $data,
            'sendOffers'  => $data
        ]));
    }

    // URL: /alternative-offer-list
    public function alternative() {
        $data = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'alternative'])->latest()->get();
        return view('pages.artists.artist-offers.alternative', $this->getDashboardContext([
            'offers'      => $data,
            'sendOffers'  => $data
        ]));
    }

    // URL: /view-offer-details/{send_offer}
    public function offerShow($send_offer) {
        try {
            $decryptedId = decrypt($send_offer);
            $offer = SendOffer::with(['userCurator', 'curatorOfferTemplate.offerType', 'artistTrack'])->findOrFail($decryptedId);

            return view('pages.artists.artist-offers.curator-offer-details', $this->getDashboardContext([
                'send_offer' => $offer
            ]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Offer details could not be loaded.');
        }
    }
}

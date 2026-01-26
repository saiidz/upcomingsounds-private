<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const IS_APPROVED = 1;

    /**
     * Ensures EVERY view gets the variables the layout/sidebar needs.
     * This prevents the 500 errors caused by missing sidebar data.
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

    // Main Dashboard / All Offers
    public function offers() {
        $offers = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::IS_APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.offers', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // Pending Offers
    public function pending() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'pending'])->latest()->get();
        return view('pages.artists.artist-offers.pending', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // Accepted Offers
    public function accepted() {
        $offers = SendOffer::where('artist_id', Auth::id())
            ->whereIn('status', ['accepted', 'delivered'])
            ->latest()->get();

        return view('pages.artists.artist-offers.accepted', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // Completed Offers
    public function completed() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'completed'])->latest()->get();
        return view('pages.artists.artist-offers.completed', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // Rejected Offers
    public function rejected() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'rejected'])->latest()->get();
        return view('pages.artists.artist-offers.rejected', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // Alternative Offers
    public function alternative() {
        $offers = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'alternative'])->latest()->get();
        return view('pages.artists.artist-offers.alternative', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    // View Offer Details
    public function offerShow($id) {
        try {
            $offer = SendOffer::with(['userCurator', 'curatorOfferTemplate.offerType'])
                ->findOrFail(decrypt($id));

            return view('pages.artists.artist-offers.curator-offer-details', $this->getDashboardContext([
                'send_offer' => $offer
            ]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Could not load offer details.');
        }
    }
}

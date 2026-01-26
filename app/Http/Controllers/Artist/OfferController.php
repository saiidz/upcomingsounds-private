<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    // Constant for approved status
    const IS_APPROVED = 1;

    /**
     * This private helper ensures EVERY view gets the variables
     * the layout/sidebar needs to stay alive.
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

    public function rejected() {
        $offers = SendOffer::where('artist_id', Auth::id())
            ->where('status', 'rejected')
            ->latest()
            ->get();

        return view('pages.artists.artist-offers.rejected', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

    public function alternative() {
        $offers = SendOffer::where('artist_id', Auth::id())
            ->where('status', 'alternative')
            ->latest()
            ->get();

        return view('pages.artists.artist-offers.alternative', $this->getDashboardContext([
            'sendOffers' => $offers
        ]));
    }

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

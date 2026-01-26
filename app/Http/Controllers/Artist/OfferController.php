<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const IS_APPROVED = 1;

    /**
     * THE MASTER CONTEXT:
     * This feeds EVERY variable name your sidebar, layout, or chat components
     * could possibly ask for. This is your insurance policy against 500 errors.
     */
    private function getDashboardContext($extraData = []) {
        $user = Auth::user();
        $base = [
            'user_artist'     => $user,
            'user'            => $user,
            'artist'          => $user,
            'profile'         => $user,
            'conversation_id' => null, // Satisfies the chat sidebar
            'receiver_id'     => null,
            'messages'        => collect([]), // Prevents empty loop crashes
        ];
        return array_merge($base, $extraData);
    }

    // Main Dashboard / artist-offers
    public function offers() {
        $data = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::IS_APPROVED])
            ->latest()->get();

        return view('pages.artists.artist-offers.offers', $this->getDashboardContext([
            'offers'     => $data,
            'sendOffers' => $data
        ]));
    }

    // Pending List
    public function pending() {
        $data = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'pending'])->latest()->get();
        return view('pages.artists.artist-offers.pending', $this->getDashboardContext([
            'offers'     => $data, 
            'sendOffers' => $data
        ]));
    }

    // Accepted List
    public function accepted() {
        $data = SendOffer::where('artist_id', Auth::id())
            ->whereIn('status', ['accepted', 'delivered'])
            ->latest()->get();
            
        return view('pages.artists.artist-offers.accepted', $this->getDashboardContext([
            'offers'     => $data, 
            'sendOffers' => $data
        ]));
    }

    // Completed List
    public function completed() {
        $data = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'completed'])->latest()->get();
        return view('pages.artists.artist-offers.completed', $this->getDashboardContext([
            'offers'     => $data, 
            'sendOffers' => $data
        ]));
    }

    // Rejected List
    public function rejected() {
        $data = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'rejected'])->latest()->get();
        return view('pages.artists.artist-offers.rejected', $this->getDashboardContext([
            'offers'     => $data, 
            'sendOffers' => $data
        ]));
    }

    // Alternative List
    public function alternative() {
        $data = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'alternative'])->latest()->get();
        return view('pages.artists.artist-offers.alternative', $this->getDashboardContext([
            'offers'     => $data, 
            'sendOffers' => $data
        ]));
    }

    /**
     * The Detail Hijacker:
     * Handles decryption and provides chat fallbacks.
     */
    public function offerShow($send_offer) {
        try {
            $decryptedId = decrypt($send_offer);
            
            $offer = SendOffer::with([
                'userCurator', 
                'curatorOfferTemplate.offerType', 
                'artistTrack'
            ])->findOrFail($decryptedId);

            return view('pages.artists.artist-offers.curator-offer-details', $this->getDashboardContext([
                'send_offer' => $offer
            ]));
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Offer details could not be loaded.');
        }
    }
}

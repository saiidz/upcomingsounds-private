<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const APPROVED = 1;

    /**
     * Mirror the data passed by the Dashboard to prevent Sidebar crashes.
     */
    private function getBaseData() {
        $user = Auth::user();
        return [
            'user_artist' => $user,
            'user'        => $user,
            'artist'      => $user, // Covering all bases for different layout versions
        ];
    }

    public function offers() {
        $data = $this->getBaseData();
        $data['sendOffers'] = SendOffer::whereHas('userCurator')
            ->with(['curatorOfferTemplate.offerType'])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.offers', $data);
    }

    public function rejected() {
        $data = $this->getBaseData();
        $data['sendOffers'] = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'rejected'])
            ->latest()->get();
        return view('pages.artists.artist-offers.rejected', $data);
    }

    public function alternative() {
        $data = $this->getBaseData();
        $data['sendOffers'] = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'alternative'])
            ->latest()->get();
        return view('pages.artists.artist-offers.alternative', $data);
    }

    public function offerShow($send_offer) {
        $data = $this->getBaseData();
        try {
            $decryptedId = decrypt($send_offer);
            $data['send_offer'] = SendOffer::with(['userCurator', 'curatorOfferTemplate.offerType'])->findOrFail($decryptedId);
            return view('pages.artists.artist-offers.curator-offer-details', $data);
        } catch (\Exception $e) {
            return redirect()->route('artist.offer.index')->with('error', 'Offer not found.');
        }
    }
}

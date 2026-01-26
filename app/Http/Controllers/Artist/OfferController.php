<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const APPROVED = 1;

    // Helper to get common data for all views
    private function getBaseData() {
        return [
            'user_artist' => Auth::user(),
            'user' => Auth::user()
        ];
    }

    public function offers() {
        $data = $this->getBaseData();
        $data['sendOffers'] = SendOffer::whereHas('userCurator')->with(['curatorOfferTemplate.offerType'])->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.offers', $data);
    }

    public function rejected() {
        $data = $this->getBaseData();
        $data['sendOffers'] = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'rejected'])->latest()->get();
        return view('pages.artists.artist-offers.rejected', $data);
    }

    public function alternative() {
        $data = $this->getBaseData();
        $data['sendOffers'] = SendOffer::where(['artist_id' => Auth::id(), 'status' => 'alternative'])->latest()->get();
        return view('pages.artists.artist-offers.alternative', $data);
    }

    public function offerShow($send_offer) {
        $data = $this->getBaseData();
        try {
            $data['send_offer'] = SendOffer::with(['userCurator', 'curatorOfferTemplate.offerType'])->findOrFail(decrypt($send_offer));
            return view('pages.artists.artist-offers.curator-offer-details', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Offer not found.');
        }
    }
    
    // Add pending, accepted, completed methods following the same $data pattern...
}

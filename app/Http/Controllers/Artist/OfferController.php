<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\SendOffer;
use App\Models\SendOfferTransaction;
use App\Models\User;
use App\Models\CuratorRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const APPROVED = 1;
    private $sendOffer;

    public function __construct(SendOffer $sendOffer)
    {
        $this->sendOffer = $sendOffer;
    }

    private function getCommonData()
    {
        return ['user_artist' => Auth::user()];
    }

    public function offers()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator') 
            ->with(['ratings' => function($query) { $query->whereNotNull('send_offer_id'); }])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.offers', $data);
    }

    public function pending()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator')
            ->where(['artist_id' => Auth::id(), 'status' => 'pending', 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.pending', $data);
    }

    public function completed()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator')
            ->with(['ratings' => function($query) { $query->whereNotNull('send_offer_id'); }])
            ->where(['artist_id' => Auth::id(), 'status' => 'completed', 'is_approved' => self::APPROVED])
            ->latest()->get();
        return view('pages.artists.artist-offers.completed', $data);
    }

    public function offerShow($send_offer)
    {
        $data = $this->getCommonData();
        $data['send_offer'] = SendOffer::with('userCurator')->findOrFail(decrypt($send_offer));
        return view('pages.artists.artist-offers.curator-offer-details', $data);
    }
}

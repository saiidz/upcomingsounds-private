<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\SendOffer;
use App\Models\SendOfferTransaction;
use App\Models\User;
use App\Models\CuratorRating; 
use App\Notifications\SendNotification;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    const APPROVED = 1;
    private $sendOffer;

    public function __construct(SendOffer $sendOffer)
    {
        $this->sendOffer = $sendOffer;
    }

    private function getCommonVars()
    {
        return [
            'user_artist' => Auth::user(), // Fixes sidebar crash
        ];
    }

    public function offers()
    {
        $data = $this->getCommonVars();
        $data['sendOffers'] = $this->sendOffer->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.offers', $data);
    }

    public function pending()
    {
        $data = $this->getCommonVars();
        $data['sendOffers'] = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::PENDING, 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.pending', $data);
    }

    public function accepted()
    {
        $data = $this->getCommonVars();
        $data['sendOffers'] = $this->sendOffer->where('artist_id', Auth::id())
            ->whereIn('status', [IOfferTemplateStatus::ACCEPTED, 'delivered'])
            ->where('is_approved', self::APPROVED)
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.accepted', $data);
    }

    public function completed()
    {
        $data = $this->getCommonVars();
        $data['sendOffers'] = $this->sendOffer->where('artist_id', Auth::id())
            ->whereIn('status', [IOfferTemplateStatus::COMPLETED, 'completed'])
            ->where('is_approved', self::APPROVED)
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.completed', $data);
    }

    public function offerShow($send_offer)
    {
        $data = $this->getCommonVars();
        $data['send_offer'] = SendOffer::findOrFail(decrypt($send_offer));
        
        $conversation = Conversation::where(function($query) use ($data) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $data['send_offer']->curator_id);
        })->orWhere(function($query) use ($data) {
            $query->where('receiver_id', Auth::id())->where('sender_id', $data['send_offer']->curator_id);
        })->first();

        if(!$conversation) {
            $conversation = Conversation::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $data['send_offer']->curator_id
            ]);
        }

        $data['messages'] = Message::where('conversation_id', $conversation->id)->get();
        return view('pages.artists.artist-offers.curator-offer-details', $data);
    }

    public function submitCuratorRating(Request $request) 
    {
        $request->validate([
            'rating_stars' => 'required|integer|between:1,5',
            'offer_id' => 'required|exists:send_offers,id',
        ]);

        if(CuratorRating::where('offer_id', $request->offer_id)->exists()) {
            return back()->with('error', 'Already rated.');
        }

        $offer = SendOffer::findOrFail($request->offer_id);

        CuratorRating::create([
            'artist_id' => Auth::id(),
            'curator_id' => $offer->curator_id,
            'offer_id' => $offer->id,
            'rating_stars' => $request->rating_stars,
            'artist_feedback' => $request->artist_feedback,
        ]);

        $offer->update(['status' => 'completed']);
        return back()->with('success', 'Rating submitted!');
    }
}

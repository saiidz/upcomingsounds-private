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
        return [
            'user_artist' => Auth::user(),
        ];
    }

    /**
     * Optimized to prevent 500 errors on the index page
     */
    public function offers()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator') // Ensures the curator still exists
            ->with(['ratings' => function($query) {
                $query->whereNotNull('send_offer_id'); // Safety check for broken ratings
            }])
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.offers', $data);
    }

    public function pending()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator')
            ->with(['ratings' => function($query) {
                $query->whereNotNull('send_offer_id');
            }])
            ->where([
                'artist_id' => Auth::id(),
                'status' => 'pending',
                'is_approved' => self::APPROVED
            ])
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.pending', $data);
    }

    public function accepted()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator')
            ->with(['userCurator', 'curatorOfferTemplate.offerType', 'ratings' => function($query) {
                $query->whereNotNull('send_offer_id');
            }])
            ->where('artist_id', Auth::id())
            ->whereIn('status', ['accepted', 'delivered', 'completed'])
            ->where('is_approved', self::APPROVED)
            ->latest()
            ->get();

        return view('pages.artists.artist-offers.accepted', $data);
    }

    public function rejected()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator')
            ->with(['ratings' => function($query) {
                $query->whereNotNull('send_offer_id');
            }])
            ->where([
                'artist_id' => Auth::id(),
                'status' => 'rejected',
                'is_approved' => self::APPROVED
            ])
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.rejected', $data);
    }

    public function alternative()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator')
            ->with(['ratings' => function($query) {
                $query->whereNotNull('send_offer_id');
            }])
            ->where([
                'artist_id' => Auth::id(),
                'status' => 'alternative',
                'is_approved' => self::APPROVED
            ])
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.alternative', $data);
    }

    public function completed()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->whereHas('userCurator')
            ->with(['ratings' => function($query) {
                $query->whereNotNull('send_offer_id');
            }])
            ->where('artist_id', Auth::id())
            ->whereIn('status', ['completed'])
            ->where('is_approved', self::APPROVED)
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.completed', $data);
    }

    public function offerShow($send_offer)
    {
        $data = $this->getCommonData();
        // Use findOrFail to catch decryption errors or missing records
        $data['send_offer'] = SendOffer::with('userCurator')->findOrFail(decrypt($send_offer));

        $conversation = Conversation::where(function($query) use ($data) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $data['send_offer']->curator_id);
        })->orWhere(function($query) use ($data) {
            $query->where('receiver_id', Auth::id())
                  ->where('sender_id', $data['send_offer']->curator_id);
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

    public function payUSCeOffer(Request $request)
    {
        if(empty($request->send_offer_id)) {
            return response()->json(['error' => 'Offer problem detected']);
        }

        $offerId = decrypt($request->send_offer_id);
        $sendOffer = SendOffer::where('id', $offerId)->first();

        if(!empty($sendOffer)) {
            if (in_array(strtolower($sendOffer->status), ['accepted', 'delivered', 'completed'])) {
                return response()->json(['error' => 'Already paid.']);
            }

            $balance = User::artistBalance();
            $contribution = decrypt($request->contribution);

            if ($contribution > $balance) {
                return response()->json(['error_wallet' => 'Insufficient USC credits']);
            }

            $sendOffer->update(['status' => 'accepted']);

            SendOfferTransaction::create([
                'send_offer_id' => $sendOffer->id,
                'artist_id'     => $sendOffer->artist_id,
                'contribution'  => $contribution,
                'curator_id'    => $sendOffer->curator_id,
                'is_approved'    => 0,
                'is_rejected'    => 0,
                'status'         => 'paid',
            ]);
        }
        return response()->json(['success' => 'Payment successful']);
    }

    public function submitCuratorRating(Request $request) 
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'send_offer_id' => 'required|exists:send_offers,id',
        ]);

        if(CuratorRating::where('send_offer_id', $request->send_offer_id)->exists()) {
            return back()->with('error', 'Already rated.');
        }

        $offer = SendOffer::findOrFail($request->send_offer_id);

        CuratorRating::create([
            'artist_id' => Auth::id(),
            'curator_id' => $offer->curator_id,
            'send_offer_id' => $offer->id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        $offer->update(['status' => 'completed']);
        return back()->with('success', 'Rating submitted!');
    }
}

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

    /**
     * Helper to ensure the Sidebar never crashes again
     */
    private function getCommonData()
    {
        return [
            'user_artist' => Auth::user(),
        ];
    }

    public function offers()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.offers', $data);
    }

    public function pending()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->where([
                'artist_id' => Auth::id(),
                'status' => IOfferTemplateStatus::PENDING,
                'is_approved' => self::APPROVED
            ])
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.pending', $data);
    }

    // ---------------- FIXED METHOD ----------------
    public function accepted()
    {
        $data = $this->getCommonData();

        // Load offers with relationships
        $sendOffers = $this->sendOffer
            ->with([
                'userCurator',
                'curatorOfferTemplate.offerType',
            ])
            ->where('artist_id', Auth::id())
            ->whereIn('status', [IOfferTemplateStatus::ACCEPTED, 'delivered', 'completed'])
            ->where('is_approved', self::APPROVED)
            ->latest()
            ->get();

        // Find which offers already have ratings
        $offerIds = $sendOffers->pluck('id');

        $ratedOffers = CuratorRating::whereIn('offer_id', $offerIds)
            ->pluck('offer_id')
            ->toArray();

        $data['sendOffers']  = $sendOffers;
        $data['ratedOffers'] = $ratedOffers;

        return view('pages.artists.artist-offers.accepted', $data);
    }
    // ---------------- END FIX ----------------

    public function rejected()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->where([
                'artist_id' => Auth::id(),
                'status' => IOfferTemplateStatus::REJECTED,
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
            ->where([
                'artist_id' => Auth::id(),
                'status' => IOfferTemplateStatus::ALTERNATIVE,
                'is_approved' => self::APPROVED
            ])
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.alternative', $data);
    }

    public function artistsSubmissions()
    {
        return view('pages.artists.artist-offers.artist-submissions', $this->getCommonData());
    }

    public function completed()
    {
        $data = $this->getCommonData();
        $data['sendOffers'] = $this->sendOffer
            ->where('artist_id', Auth::id())
            ->whereIn('status', [IOfferTemplateStatus::COMPLETED, 'completed'])
            ->where('is_approved', self::APPROVED)
            ->latest()
            ->get();
        return view('pages.artists.artist-offers.completed', $data);
    }

    public function new()
    {
        return view('pages.artists.artist-offers.new', $this->getCommonData());
    }

    public function proposition()
    {
        return view('pages.artists.artist-offers.proposition', $this->getCommonData());
    }

    public function offerShow($send_offer)
    {
        $data = $this->getCommonData();
        $data['send_offer'] = SendOffer::findOrFail(decrypt($send_offer));

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

            $sendOffer->update(['status' => IOfferTemplateStatus::ACCEPTED]);

            SendOfferTransaction::create([
                'send_offer_id' => $sendOffer->id,
                'artist_id'     => $sendOffer->artist_id,
                'contribution'  => $contribution,
                'curator_id'    => $sendOffer->curator_id,
                'is_approved'   => 0,
                'is_rejected'   => 0,
                'status'        => IOfferTemplateStatus::PAID,
            ]);
        }
        return response()->json(['success' => 'Payment successful']);
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

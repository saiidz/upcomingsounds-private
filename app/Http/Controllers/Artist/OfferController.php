<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    const APPROVED = 1;

    /**
     * @var SendOffer
     */
    private $sendOffer;

    /**
     * @param SendOffer $sendOffer
     */
    public function __construct(SendOffer $sendOffer)
    {
        $this->sendOffer = $sendOffer;
    }

    /**
     * @return Application|Factory|View
     */
    public function offers()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])->get();
        return view('pages.artists.artist-offers.offers', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function pending()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::PENDING, 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.pending', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function accepted()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::ACCEPTED,'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.accepted', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function rejected()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::REJECTED, 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.rejected', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function alternative()
    {
        return view('pages.artists.artist-offers.alternative', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function artistsSubmissions()
    {
        return view('pages.artists.artist-offers.artist-submissions', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function completed()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::COMPLETED,'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.completed', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function new()
    {
        return view('pages.artists.artist-offers.new', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function proposition()
    {
        return view('pages.artists.artist-offers.proposition', get_defined_vars());
    }

    /**
     * @param $send_offer
     * @return Application|Factory|View
     */
    public function offerShow($send_offer)
    {
        $send_offer = SendOffer::find(decrypt($send_offer));
        return view('pages.artists.artist-offers.curator-offer-details', get_defined_vars());
    }
}

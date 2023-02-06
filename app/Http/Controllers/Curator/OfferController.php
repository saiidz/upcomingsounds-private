<?php

namespace App\Http\Controllers\Curator;

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
        $sendOffers = $this->sendOffer->where('curator_id',Auth::id())->get();
        return view('pages.curators.curator-offers.offers', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function pending()
    {
        $sendOffers = $this->sendOffer->where(['curator_id' => Auth::id(), 'status' => IOfferTemplateStatus::PENDING])->get();
        return view('pages.curators.curator-offers.pending', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function accepted()
    {
        $sendOffers = $this->sendOffer->where(['curator_id' => Auth::id(), 'status' => IOfferTemplateStatus::ACCEPTED])->get();
        return view('pages.curators.curator-offers.accepted', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function rejected()
    {
        $sendOffers = $this->sendOffer->where(['curator_id' => Auth::id(), 'status' => IOfferTemplateStatus::REJECTED])->get();
        return view('pages.curators.curator-offers.rejected', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function expired()
    {
        $sendOffers = $this->sendOffer->where(['curator_id' => Auth::id(), 'status' => IOfferTemplateStatus::EXPIRED])->get();
        return view('pages.curators.curator-offers.expired', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function alternative()
    {
        return view('pages.curators.curator-offers.alternative', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function artistsSubmissions()
    {
        return view('pages.curators.curator-offers.artist-submissions', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function completed()
    {
        $sendOffers = $this->sendOffer->where(['curator_id' => Auth::id(), 'status' => IOfferTemplateStatus::COMPLETED])->get();
        return view('pages.curators.curator-offers.completed', get_defined_vars());
    }
}

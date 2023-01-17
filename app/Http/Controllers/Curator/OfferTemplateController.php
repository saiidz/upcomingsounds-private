<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OfferTemplateController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pages.curators.curator-offer-template.proposition', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.curators.curator-offer-template.create', get_defined_vars());
    }

}

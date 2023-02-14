<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curator\SubmitWork;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubmitWorkController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function submitWork()
    {
        $submitWorks = SubmitWork::latest()->get();
        return view('admin.pages.submit-work.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function detailSubmitWork(SubmitWork $submitWork)
    {
//        dd($submitWork->sendOffer->curatorOfferTemplate);
        return view('admin.pages.submit-work.submit-work-view', get_defined_vars());
    }
}

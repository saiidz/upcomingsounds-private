<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SubmitCoverage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoverageController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function coverage()
    {
        $submitCoverage = SubmitCoverage::where('artist_id', Auth::id())->get();
        return view('pages.artists.artist-coverage.coverage',get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function coverageDetails()
    {
        return view('pages.artists.artist-coverage.coverage-details',get_defined_vars());
    }
}

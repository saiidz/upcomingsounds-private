<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\SubmitCoverage;
use Illuminate\Contracts\Encryption\DecryptException;
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
        $submitCoverages = SubmitCoverage::where('artist_id', Auth::id())->latest()->get();
//        dd($submitCoverages,Auth::id());
        return view('pages.artists.artist-coverage.coverage',get_defined_vars());
    }

    /**
     * @param $submitCoverage
     * @return Application|Factory|View|void
     */
    public function viewSubmitCoverageDetails($submitCoverage)
    {
        try {
            $submitCoverage = SubmitCoverage::find(decrypt($submitCoverage));
            return view('pages.artists.artist-coverage.submit-coverage-details', get_defined_vars());
        }catch (DecryptException $exception)
        {
            abort('403');
        }
    }
}

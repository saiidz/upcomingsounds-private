<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoverageController extends Controller
{

    public function coverage()
    {
        return view('pages.artists.artist-coverage.coverage',get_defined_vars());
    }

    public function coverageDetails()
    {
        return view('pages.artists.artist-coverage.coverage-details',get_defined_vars());
    }
}

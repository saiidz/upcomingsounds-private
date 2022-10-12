<?php

namespace App\Http\Controllers\Curator;

use Illuminate\Http\Request;
use App\Models\CuratorFeature;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CuratorVerificationForm;

class ArtistSubmissionController extends Controller
{
   /**
     * curatorDashboard
     */
    public function curatorDashboard()
    {
        $curator_features = CuratorFeature::all();
        return view('pages.curators.dashboard', get_defined_vars());
    }

    /**
     * artistSubmission
     */
    public function artistSubmission()
    {
        return view('pages.curators.artist-submission.artist-submission', get_defined_vars());
    }

    /**
     * artistSaved
     */
    public function artistSaved()
    {
        return view('pages.curators.artist-submission.artist-saved', get_defined_vars());
    }

    /**
     * artistAccepted
     */
    public function artistAccepted()
    {
        return view('pages.curators.artist-submission.artist-accepted', get_defined_vars());
    }

    /**
     * artistRejected
     */
    public function artistRejected()
    {
        return view('pages.curators.artist-submission.artist-rejected', get_defined_vars());
    }

    /**
     * getVerified
     */
    public function getVerified()
    {
        $curator_verification_form = CuratorVerificationForm::where('user_id', Auth::id())->latest()->first();
        return view('pages.curators.curator-get-verified.get-verified', get_defined_vars());
    }
}

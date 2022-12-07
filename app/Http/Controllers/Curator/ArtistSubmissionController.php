<?php

namespace App\Http\Controllers\Curator;

use App\Models\Campaign;
use App\Templates\IPackages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\CuratorFeature;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CuratorVerificationForm;

class ArtistSubmissionController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function curatorDashboard()
    {
        $curator_features = CuratorFeature::all();
        $standard_campaigns = Campaign::where('package_name', IPackages::STANDARD_NAME)->get();
        $advance_campaigns = Campaign::where('package_name', IPackages::ADVANCED_FEATURED_NAME)->get();
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

    public function getActiveStore(Request $request)
    {
        if ($request->campaign_id)
        {
            $campaign = Campaign::find($request->campaign_id);

            // render Html in collapse
            $returnHTML = view('pages.curators.collapsed_sidebar')->with('campaign', $campaign)->render();

            if($request->ajax()){
                return response()->json([
                    'success' => 'Campaign Found successfully',
                    'campaign'      => $returnHTML,
                ]);
            }
        }else
        {
            return response()->json(['error' => 'Campaign Not Found.']);
        }

    }
}

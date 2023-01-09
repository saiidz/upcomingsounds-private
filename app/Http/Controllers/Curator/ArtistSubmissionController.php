<?php

namespace App\Http\Controllers\Curator;

use App\Models\Campaign;
use App\Models\Option;
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
        $standard_campaigns = Campaign::where('package_name', IPackages::STANDARD_NAME)->latest()->get();
        $advance_campaigns = Campaign::where('package_name', IPackages::ADVANCED_FEATURED_NAME)->latest()->get();
        $pro_campaigns = Campaign::where('package_name', IPackages::PRO_NAME)->take(4)->latest()->get();
        $premium_campaigns = Campaign::where(['add_remove_banner' => IPackages::ADD_BANNER])->latest()->get();
//        dd($premium_campaigns);
        $pro_premium_campaigns = Campaign::where('package_name', IPackages::PRO_NAME)->orWhere('package_name', IPackages::PREMIUM_NAME)
                                            ->whereNotNull('track_id')->latest()->get();
        $theme = Option::where('key', 'curators_settings')->first();
        if(!empty($theme))
        {
            $theme = json_decode($theme->value);
        }
        return view('pages.curators.dashboard', get_defined_vars());
    }

    /**
     * @return Application|Factory|View|never
     */
    public function artistSubmission()
    {
        $user = Auth::user();
        if(!empty($user) && $user->is_verified == 1)
        {
            $campaigns = Campaign::whereNotNull('track_id')->latest()->get();
            return view('pages.curators.artist-submission.artist-submission', get_defined_vars());
        }else{
            return abort(403, "Restricted Access!");
        }

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

    public function favoriteTrack(Request $request)
    {
        if ($request->campaign_id)
        {
            $campaign = Campaign::find($request->campaign_id);

            if($request->ajax()){
                return response()->json([
                    'success' => 'Campaign Found successfully',
                ]);
            }
        }else
        {
            return response()->json(['error' => 'Campaign Not Found.']);
        }
    }
}

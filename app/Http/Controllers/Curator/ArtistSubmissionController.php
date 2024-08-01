<?php

namespace App\Http\Controllers\Curator;

use App\Models\AlternativeOption;
use App\Models\Campaign;
use App\Models\CuratorFavoriteArtist;
use App\Models\CuratorFavoriteTrack;
use App\Models\CuratorFeatureTag;
use App\Models\CuratorOfferTemplate;
use App\Models\OfferType;
use App\Models\Option;
use App\Models\SendOffer;
use App\Models\SubmitCoverage;
use App\Templates\IFavoriteTrackStatus;
use App\Templates\IMessageTemplates;
use App\Templates\IOfferTemplateStatus;
use App\Templates\IPackages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\CuratorFeature;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CuratorVerificationForm;
use Illuminate\Support\Facades\DB;

class ArtistSubmissionController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function curatorDashboard()
    {
        $limit = 500;
        $curator_features = CuratorFeature::all();
        $campaignsArtistSubmissions = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->whereNotNull('campaigns.track_id')
            ->where('is_expired_campaign',0)
            ->doesntHave('curatorFavoriteTrack')
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->latest()->get();

        $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaignsArtistSubmission) {
            return $campaignsArtistSubmission->submitCoverages->where('curator_id', Auth::id())->count() > 0;
        })->flatten();

        $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaign)
        {
            $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
            return $sendOffer == true;
        })->flatten();

//        $standard_campaigns = Campaign::where('package_name', IPackages::STANDARD_NAME)->take(16)->latest()->get();
        $standard_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where('package_name', IPackages::STANDARD_NAME)
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->latest()
            ->get();
        $standard_campaigns = $standard_campaigns->reject(function ($standard_campaign) {
            return $standard_campaign->submitCoverages->where('curator_id', Auth::id())->count() > 0;
        })->flatten();

//        $advance_campaigns = Campaign::where('package_name', IPackages::ADVANCED_FEATURED_NAME)->latest()->get();
        $advance_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where('package_name', IPackages::ADVANCED_FEATURED_NAME)
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->latest()
            ->get();
        $advance_campaigns = $advance_campaigns->reject(function ($advance_campaign) {
            return $advance_campaign->submitCoverages->where('curator_id', Auth::id())->count() > 0;
        })->flatten();

        $trending_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where(function($query) {
                $query->orWhere('package_name', IPackages::STANDARD_NAME)
                    ->orWhere('package_name', IPackages::ADVANCED_FEATURED_NAME)
                    ->orWhere('package_name', IPackages::PRO_NAME)
                    ->orWhere('package_name', IPackages::PREMIUM_NAME);
            })
            ->whereNotNull('campaigns.track_id')
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->latest()
            ->get();
        $trending_campaigns = $trending_campaigns->reject(function ($trending_campaign) {
            return $trending_campaign->submitCoverages->where('curator_id', Auth::id())->count() > 0;
        })->flatten();

//        $pro_campaigns = Campaign::where('package_name', IPackages::PRO_NAME)->take(4)->latest()->get();
        $pro_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where('package_name', IPackages::PRO_NAME)
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->take(4)
            ->latest()
            ->get();

        $pro_campaigns = $pro_campaigns->reject(function ($pro_campaign) {
            return $pro_campaign->submitCoverages->where('curator_id', Auth::id())->count() > 0;
        })->flatten();

        $premium_campaigns = Campaign::where(['add_remove_banner' => IPackages::ADD_BANNER])->latest()->get();
//        dd($premium_campaigns);
//        $pro_premium_campaigns = Campaign::where('package_name', IPackages::PRO_NAME)->orWhere('package_name', IPackages::PREMIUM_NAME)
//                                            ->whereNotNull('track_id')->latest()->get();

        $pro_premium_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where(function($query) {
                $query->where('package_name', IPackages::PRO_NAME)
                    ->orWhere('package_name', IPackages::PREMIUM_NAME);
            })
            ->whereNotNull('campaigns.track_id') // Fix: Use where instead of whereNotNull
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->latest()
            ->get();

        $pro_premium_campaigns = $pro_premium_campaigns->reject(function ($pro_premium_campaign) {
            return $pro_premium_campaign->submitCoverages->where('curator_id', Auth::id())->count() > 0;
        })->flatten();

        $theme = Option::where('key', 'curators_settings')->first();
        if(!empty($theme))
            $theme = json_decode($theme->value);

        $theme_settings = Option::where('key', 'theme_settings')->first();
        if(!empty($theme_settings))
            $theme_settings = json_decode($theme_settings->value);

        # submit coverage
        $submitCoverages = SubmitCoverage::where('curator_id', Auth::id())->latest()->get();
//        dd($submitCoverages);

        # Recommend for you
        $recommendSubmitCoverages = SubmitCoverage::selectRaw('MAX(id) as id,MAX(curator_id),MAX(artist_id), track_id,MAX(campaign_id), MAX(created_at) as created_at') // Add other columns as needed
                                        ->whereNull('deleted_at')
                                            ->groupBy('track_id')
                                            ->latest('created_at')
                                            ->get();


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
            $curator_features = CuratorFeature::all();

            $campaigns = Campaign::whereNotNull('track_id')
                                    ->where('is_expired_campaign',0)
                                    ->doesntHave('curatorFavoriteTrack')
                                    ->latest()->get();

            $campaigns = $campaigns->reject(function ($campaign)
            {
                $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                return $sendOffer == true;
            })->flatten();

            return view('pages.curators.artist-submission.artist-submission', get_defined_vars());
        }else{
            return abort(403, "Restricted Access!");
        }

    }

    /**
     * @return Application|Factory|View|never
     */
    public function artistSaved()
    {
        $user = Auth::user();
        if(!empty($user) && $user->is_verified == 1)
        {
            $saved = CuratorFavoriteTrack::where(['user_id' => Auth::id(), 'status' => IFavoriteTrackStatus::SAVE])->latest()->get();
            $saved = $saved->reject(function ($saved){
                if(!empty($saved->campaign))
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $saved->campaign->id])->first();
                    return $sendOffer == true;
                }
            })->flatten();

            return view('pages.curators.artist-submission.artist-saved', get_defined_vars());
        }else{
            return abort(403, "Restricted Access!");
        }
    }

    /**
     * @return Application|Factory|View|never
     */
    public function artistAccepted()
    {
        $user = Auth::user();
        if(!empty($user) && $user->is_verified == 1)
        {
            $accepted = CuratorFavoriteTrack::where(['user_id' => Auth::id(), 'status' => IFavoriteTrackStatus::ACCEPTED])->latest()->get();
            return view('pages.curators.artist-submission.artist-accepted', get_defined_vars());
        }else{
            return abort(403, "Restricted Access!");
        }
    }

    /**
     * @return Application|Factory|View|never
     */
    public function artistRejected()
    {
        $user = Auth::user();
        if(!empty($user) && $user->is_verified == 1)
        {
            $rejected = CuratorFavoriteTrack::where(['user_id' => Auth::id(), 'status' => IFavoriteTrackStatus::REJECTED])->latest()->get();
            $rejected = $rejected->reject(function ($rejected){
                if(!empty($rejected->campaign))
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $rejected->campaign->id])->first();
                    return $sendOffer == true;
                }
            })->flatten();
            return view('pages.curators.artist-submission.artist-rejected', get_defined_vars());
        }else{
            return abort(403, "Restricted Access!");
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function getVerified(Request $request)
    {
//        $curator_verification_form = CuratorVerificationForm::where('user_id', Auth::id())->latest()->first();
        $curatorVerificationForm = CuratorVerificationForm::select('curator_verification_forms.*')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id) as id'))
                    ->from('curator_verification_forms')
                    ->where('user_id', auth()->id());
            })
            ->first();

        $curatorVerificationFormCount = CuratorVerificationForm::where('user_id', Auth::id())->count();

        $user = Auth::user();

        $theme = Option::where('key', 'curators_settings')->first();
        $theme = !empty($theme) ? json_decode($theme->value) : '';
        return view('pages.curators.curator-get-verified.get-verified', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function getActiveStore(Request $request)
    {
        if ($request->campaign_id)
        {
            $campaign = Campaign::find($request->campaign_id);

            // offerTemplate
            $offerTemplates = CuratorOfferTemplate::where(['user_id' => Auth::id(),'type' => IOfferTemplateStatus::TYPE_OFFER ,'is_active' => 1, 'is_approved' => 1])->latest()->get();

            //offer_types
            $offer_types = AlternativeOption::get();
//            dd($offer_types);
//            $offer_types = OfferType::get();

            // render Html in collapse
            $returnHTML = view('pages.curators.collapsed_sidebar')->with(['campaign' => $campaign, 'offerTemplates' => $offerTemplates, 'offer_types' => $offer_types])->render();

            if($request->ajax()){
                return response()->json([
                    'success' => 'Campaign Found successfully',
                    'campaign'      => $returnHTML,
                    'campaign_id'      => $campaign->id,
                ]);
            }
        }else
        {
            return response()->json(['error' => 'Campaign Not Found.']);
        }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function favoriteTrack(Request $request)
    {
        if($request->ajax()){
            if ($request->track_id)
            {
                $track_id = base64_decode($request->track_id);
                $status = base64_decode($request->status);

                // if record exists in database
                $curatorFavoriteTrack = CuratorFavoriteTrack::where(['user_id' => Auth::id(), 'track_id' => $track_id])->first();
                if(!empty($curatorFavoriteTrack))
                {
                    $curatorFavoriteTrack->delete();
                    return response()->json([
                        'success' => 'Track Updated successfully',
                        'reload_page'  => 'reload_page',
                    ]);
                }

                CuratorFavoriteTrack::create([
                    'user_id'  => Auth::id(),
                    'track_id' => $track_id,
                    'status'   => $status,
                ]);
                return response()->json([
                    'success' => 'Track Updated successfully',
                    'statusTrack'  => $status,
                ]);
            }else
            {
                return response()->json(['error' => 'Error In Ajax call.']);
            }
        }else
        {
            return response()->json(['error' => 'Error In Ajax call.']);
        }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function favoriteArtist(Request $request)
    {
        if($request->ajax()){
            if ($request->artist_id)
            {
                $artist_id = base64_decode($request->artist_id);

                // if record exists in database
                $curatorFavoriteArtist = CuratorFavoriteArtist::where(['curator_id' => Auth::id(), 'artist_id' => $artist_id])->first();
                if(!empty($curatorFavoriteArtist))
                {
                    $curatorFavoriteArtist->delete();
                    return response()->json([
                        'success' => 'Artist Updated successfully',
                        'reload_page'  => 'reload_page',
                    ]);
                }

                CuratorFavoriteArtist::create([
                    'curator_id'  => Auth::id(),
                    'artist_id' => $artist_id,
                ]);
                return response()->json([
                    'success' => 'Artist Updated successfully',
                    'statusArtist'  => true,
                ]);
            }else
            {
                return response()->json(['error' => 'Error In Ajax call.']);
            }
        }else
        {
            return response()->json(['error' => 'Error In Ajax call.']);
        }
    }
}

<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CuratorFeatureTag;
use App\Models\SendOffer;
use App\Templates\IMessageTemplates;
use App\Templates\IPackages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse|void
     * @throws \Throwable
     */
    public function filterArtistSubmission(Request $request)
    {
        if ($request->option_filter)
        {
            if ($request->option_filter == IMessageTemplates::OLDEST)
            {
                $campaigns = Campaign::whereNotNull('track_id')
                    ->where('is_expired_campaign', 0)
                    ->doesntHave('curatorFavoriteTrack')
                    ->oldest()
                    ->get();

                $campaigns = $campaigns->reject(function ($campaign)
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                    return $sendOffer == true;
                })->flatten();
            }else if ($request->option_filter == IMessageTemplates::NEWEST)
            {
                $campaigns = Campaign::whereNotNull('track_id')
                    ->where('is_expired_campaign', 0)
                    ->doesntHave('curatorFavoriteTrack')
                    ->latest()
                    ->get();

                $campaigns = $campaigns->reject(function ($campaign)
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                    return $sendOffer == true;
                })->flatten();
            }
            else if ($request->option_filter == IMessageTemplates::RELEASE_DATE)
            {
                $campaigns = Campaign::whereHas('artistTrack',function ($q){
                    $q->orderByRaw('YEAR(release_date), MONTH(release_date)');
                })->whereNotNull('track_id')
                    ->where('is_expired_campaign', 0)
                    ->doesntHave('curatorFavoriteTrack')
                    ->latest()
                    ->get();

                $campaigns = $campaigns->reject(function ($campaign)
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                    return $sendOffer == true;
                })->flatten();
            }
            else if ($request->option_filter == IMessageTemplates::GENRE)
            {
                $curatorFeatureTagIds = CuratorFeatureTag::where('curator_feature_id', $request->curator_feature_id)
                    ->pluck('id')
                    ->toArray();

                $campaigns = Campaign::with('artistTrack')
                    ->whereHas('artistTrack', function ($query) use ($curatorFeatureTagIds) {
                        $query->whereHas('artistTrackTags', function ($innerQuery) use ($curatorFeatureTagIds) {
                            $innerQuery->whereIn('curator_feature_tag_id', $curatorFeatureTagIds);
                        });
                    })
                    ->whereNotNull('track_id')
                    ->where('is_expired_campaign', 0)
                    ->whereDoesntHave('curatorFavoriteTrack')
                    ->latest()
                    ->get();

                $campaigns = $campaigns->reject(function ($campaign)
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                    return $sendOffer == true;
                })->flatten();
            }

            // render Html in collapse
            $returnHTML = view('pages.curators.artist-submission.__filter-artist-submission')->with(['campaigns' => $campaigns])->render();

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

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function filterCuratorDashboard(Request $request)
    {
        if ($request->curator_feature_id)
        {

            $curatorFeatureTagIds = CuratorFeatureTag::where('curator_feature_id', $request->curator_feature_id)
                ->pluck('id')
                ->toArray();

            $limit = 500;
            $standard_campaigns = Campaign::with('artistTrack')
                ->whereHas('artistTrack', function ($query) use ($curatorFeatureTagIds) {
                    $query->whereHas('artistTrackTags', function ($innerQuery) use ($curatorFeatureTagIds) {
                        $innerQuery->whereIn('curator_feature_tag_id', $curatorFeatureTagIds);
                    });
                })->leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
                ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
                ->where('package_name', IPackages::STANDARD_NAME)
                ->groupBy('campaigns.id')
                ->having('coverage_count', '<=', $limit)
                ->latest()
                ->get();
            $standard_campaigns = $standard_campaigns->reject(function ($standard_campaign) {
                return $standard_campaign->submitCoverages->where('curator_id', Auth::id())->count() > 0;
            })->flatten();

            // render Html in collapse
            $returnHTML = view('pages.curators.dashboard-partial.__new')->with(['standard_campaigns' => $standard_campaigns])->render();

            if($request->ajax()){
                return response()->json([
                    'success' => 'Campaign Found successfully',
                    'standard_campaigns'      => $returnHTML,
                ]);
            }
        }else
        {
            return response()->json(['error' => 'Campaign Not Found.']);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     * @throws \Throwable
     */
    public function filterArtistSubmissionDashboard(Request $request)
    {
        if ($request->option_filter)
        {
            $limit = 500;
            if ($request->option_filter == IMessageTemplates::OLDEST)
            {
                $campaignsArtistSubmissions = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
                    ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
                    ->whereNotNull('campaigns.track_id')
                    ->where('is_expired_campaign', 0)
                    ->doesntHave('curatorFavoriteTrack')
                    ->groupBy('campaigns.id')
                    ->having('coverage_count', '<=', $limit)
                    ->oldest()
                    ->get();

                $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaignsArtistSubmission) {
                    return $campaignsArtistSubmission->submitCoverages->where('curator_id', Auth::id())->count() > 0;
                })->flatten();

                $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaign)
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                    return $sendOffer == true;
                })->flatten();
            }else if ($request->option_filter == IMessageTemplates::NEWEST)
            {
                $campaignsArtistSubmissions = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
                    ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
                    ->whereNotNull('campaigns.track_id')
                    ->where('is_expired_campaign', 0)
                    ->doesntHave('curatorFavoriteTrack')
                    ->groupBy('campaigns.id')
                    ->having('coverage_count', '<=', $limit)
                    ->latest()
                    ->get();

                $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaignsArtistSubmission) {
                    return $campaignsArtistSubmission->submitCoverages->where('curator_id', Auth::id())->count() > 0;
                })->flatten();

                $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaign)
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                    return $sendOffer == true;
                })->flatten();
            }
            else if ($request->option_filter == IMessageTemplates::RELEASE_DATE)
            {
                $campaignsArtistSubmissions = Campaign::whereHas('artistTrack',function ($q){
                    $q->orderByRaw('YEAR(release_date), MONTH(release_date)');
                })->leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
                    ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
                    ->whereNotNull('campaigns.track_id')
                    ->where('is_expired_campaign', 0)
                    ->doesntHave('curatorFavoriteTrack')
                    ->groupBy('campaigns.id')
                    ->having('coverage_count', '<=', $limit)
                    ->latest()
                    ->get();

                $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaignsArtistSubmission) {
                    return $campaignsArtistSubmission->submitCoverages->where('curator_id', Auth::id())->count() > 0;
                })->flatten();

                $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaign)
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                    return $sendOffer == true;
                })->flatten();
            }
            else if ($request->option_filter == IMessageTemplates::GENRE)
            {
                $curatorFeatureTagIds = CuratorFeatureTag::where('curator_feature_id', $request->curator_feature_id)
                    ->pluck('id')
                    ->toArray();

                $campaignsArtistSubmissions = Campaign::with('artistTrack')
                    ->whereHas('artistTrack', function ($query) use ($curatorFeatureTagIds) {
                        $query->whereHas('artistTrackTags', function ($innerQuery) use ($curatorFeatureTagIds) {
                            $innerQuery->whereIn('curator_feature_tag_id', $curatorFeatureTagIds);
                        });
                    })
                    ->leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
                    ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
                    ->whereNotNull('campaigns.track_id')
                    ->where('is_expired_campaign', 0)
                    ->whereDoesntHave('curatorFavoriteTrack')
                    ->groupBy('campaigns.id')
                    ->having('coverage_count', '<=', $limit)
                    ->latest()
                    ->get();

                $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaignsArtistSubmission) {
                    return $campaignsArtistSubmission->submitCoverages->where('curator_id', Auth::id())->count() > 0;
                })->flatten();

                $campaignsArtistSubmissions = $campaignsArtistSubmissions->reject(function ($campaign)
                {
                    $sendOffer =  SendOffer::where(['curator_id' => Auth::id(), 'campaign_id' => $campaign->id])->first();
                    return $sendOffer == true;
                })->flatten();
            }
            // render Html in collapse
            $returnHTML = view('pages.curators.__filter-artist-submission-dashboard')->with(['campaignsArtistSubmissions' => $campaignsArtistSubmissions])->render();

            if($request->ajax()){
                return response()->json([
                    'success' => 'Campaign Found successfully',
                    'campaignsArtistSubmissions'      => $returnHTML,
                ]);
            }
        }else
        {
            return response()->json(['error' => 'Campaign Not Found.']);
        }

    }
}

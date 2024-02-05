<?php

namespace App\Http\Controllers;

use App\Models\Artist\ArtistFavoriteCurator;
use App\Models\Campaign;
use App\Models\Curator\VerifiedCoverage;
use App\Models\CuratorFeatureTag;
use App\Models\ReferralRelationship;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Language;
use App\Models\ArtistTrack;
use App\Notifications\SendNotification;
use App\Templates\IMessageTemplates;
use App\Templates\IPackages;
use App\Templates\IStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\CuratorFeature;
use App\Models\ArtistTrackLink;
use App\Models\PromoteYourTrack;
use Illuminate\Http\JsonResponse;
use App\Models\ArtistTrackLanguage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Artist\AddYourTrackRequest;

class PromoteYourTrackController extends Controller
{
    /**
     * PromoteYourTrack index
     */
    public function index(Request $request)
    {
        $user_artist = Auth::user();
        $curators = User::getReceivedCurstors()->count();
        $page = 'welcome-your-track';

        $curator_features = CuratorFeature::all();
        $limit = 500;
        $standard_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where('package_name', IPackages::STANDARD_NAME)
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->latest()
            ->get();
        $advance_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where('package_name', IPackages::ADVANCED_FEATURED_NAME)
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->latest()
            ->get();
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
        $pro_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where('package_name', IPackages::PRO_NAME)
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->take(4)
            ->latest()
            ->get();
        $premium_campaigns = Campaign::where(['add_remove_banner' => IPackages::ADD_BANNER])->latest()->get();
        $pro_premium_campaigns = Campaign::leftJoin('submit_coverages', 'campaigns.track_id', '=', 'submit_coverages.track_id')
            ->select('campaigns.*', DB::raw('COUNT(submit_coverages.id) as coverage_count'))
            ->where('package_name', IPackages::PRO_NAME)
            ->orWhere('package_name', IPackages::PREMIUM_NAME)
            ->whereNotNull('campaigns.track_id')
            ->groupBy('campaigns.id')
            ->having('coverage_count', '<=', $limit)
            ->latest()
            ->get();

        return view('pages.artists.artist-promote-your-track.promote-your-track',get_defined_vars());
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function addYourTrack(Request $request)
    {
        $page = 'promote-your-track';
        $user_artist = Auth::user();
        $artist_tracks = ArtistTrack::where('user_id',$user_artist->id)->where('is_approved', 1)->latest()->get();

        $artist_tracks = $artist_tracks->reject(function ($track){
            $campaign = Campaign::where(['user_id' => Auth::id(), 'track_id' => $track->id])->latest()->first();
            if(!empty($campaign)){
                $data = getExpiryDayCampaign($campaign->created_at);
                if($data == 'false')
                    return '';
                else
                    return $data;
            }
        })->flatten();

        $languages = Language::all();

        $curator_features_ids = CuratorFeature::pluck('id')->toArray();
        $curator_featuress = CuratorFeatureTag::with('curatorFeature')->whereHas('curatorFeature', function($q){
                                    $q->select('name');
                                })->whereIn('curator_feature_id', $curator_features_ids)->get()
                                    ->groupBy('curatorFeature.name');
        $curator_features = CuratorFeature::all();
        return view('pages.artists.artist-promote-your-track.add-your-track',get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeTrackCampaign(Request $request)
    {
        $artist_credits = !empty(Auth::user()->TransactionUserInfo) ? Auth::user()->TransactionUserInfo->transactionHistory->sum('credits') - (!empty(Auth::user()->campaign) ? Auth::user()->campaign->sum('usc_credit') : 0) : 0;
//        $artist_credits = !empty(Auth::user()->TransactionUserInfo) ? number_format(Auth::user()->TransactionUserInfo->transactionHistory->sum('credits')) - (!empty(Auth::user()->campaign) ? number_format(Auth::user()->campaign->sum('usc_credit')) : 0) : 0;

        $usc_credits = $request->usc_credit;
        if ($usc_credits > $artist_credits)
            return response()->json(['error' => 'You have insufficient '.$artist_credits.'USC credits, please go to wallet and purchased credits']);

        $input = $request->all();
        # create campaign
        $input['user_id'] = Auth::id();
        if ($request->package_name == IPackages::PREMIUM_NAME)
        {
            $input['add_days'] = IPackages::ADD_DAYS;
            $input['add_remove_banner'] = IPackages::ADD_BANNER;
        }

        #store campaign expire date add
        $carbon =   Carbon::now();
        $carbon_target    = Carbon::parse($carbon)->addDays(45);
        $input['is_expired_campaign_date'] = $carbon_target;

        $campaign = Campaign::create($input);

        // update curator credit if artist signup from curator referral
        $referral = ReferralRelationship::where('user_id',Auth::id())->first();

        if(!empty($referral))
        {
            $curatorTransaction = TransactionHistory::where('user_id',$referral->referralLink->user_id)
                ->where('referral_relationship_id',$referral->id)->first();
            if(!empty($curatorTransaction))
                $curatorTransaction->update([
                    'payment_status' => IStatus::COMPLETED,
                ]);
        }
        return response()->json(['success' => 'Campaign created successfully.']);
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function getCurators(Request $request)
    {
        if($request->recieved_check == 1)
        {
            $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                $q->whereIn('curator_signup_from',['sound_expert_producer','brooker_booking','monitor_publisher_synch']);
            })->getReceivedCurstors()->latest()->get();

            return response()->json([
                'success' => 'we have '.$curators->count().' curators',
                'curators' => $curators,
            ]);
        }elseif($request->visibility_check == 2)
        {
            $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                $q->whereIn('curator_signup_from',['playlist_curator','influencer','youtube_channel','radio_tv']);
            })->getReceivedCurstors()->latest()->get();
            return response()->json([
                'success' => 'we have '.$curators->count().' curators',
                'curators' => $curators,
            ]);
        }elseif($request->establish_check == 3)
        {
            $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                $q->whereIn('curator_signup_from',['journalist_media','label_manager','media']);
            })->getReceivedCurstors()->latest()->get();
            return response()->json([
                'success' => 'we have '.$curators->count().' curators',
                'curators' => $curators,
            ]);
        }

        if(!empty($request->right_now_check))
        {
            if($request->right_now_check == 'right_now_check')
            {
                if($request->right_now_id == 1)
                {
                    $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                        $q->whereIn('curator_signup_from',['sound_expert_producer','brooker_booking','monitor_publisher_synch']);
                    })->getReceivedCurstors()->latest()->get();

                }elseif($request->right_now_id == 2)
                {
                    $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                        $q->whereIn('curator_signup_from',['playlist_curator','influencer','youtube_channel','radio_tv']);
                    })->getReceivedCurstors()->latest()->get();

                }elseif($request->right_now_id == 3)
                {
                    $curators = User::with('curatorUser')->whereHas('curatorUser', function($q){
                        $q->whereIn('curator_signup_from',['journalist_media','label_manager','media']);
                    })->getReceivedCurstors()->latest()->get();
                }else{
                    $curators = VerifiedCoverage::with('user','offerType')
                        ->where([
                        'is_active'   => IStatus::IS_ACTIVE,
                        'is_approved' => IStatus::IS_APPROVED,
                    ])->latest()->get();
                }

                $curator_list = view('pages.artists.artist-promote-your-track.form-wizard.selection-curator')->with('curators', $curators)->render();
                return response()->json([
                    'success' => 'we have '.$curators->count().' Verified Coverage Curators',
                    'curators' => $curator_list,
                ]);
            }
        }

        // return false;
        // $page = 'add-your-track';
        // $user_artist = Auth::user();
        // $artist_tracks = ArtistTrack::where('user_id',$user_artist->id)->orderBy('id','desc')->get();

        // return view('pages.artists.artist-promote-your-track.add-your-track',get_defined_vars());
    }

    /**
     * @param AddYourTrackRequest $request
     * @return JsonResponse
     */
    public function storeAddTrack(AddYourTrackRequest $request): JsonResponse
    {
        //check if demo on
        if($request->demo == "on")
        {
            if(empty($request->audio))
            {
                return response()->json(['error' => 'Please add song because demo is on']);
            }
        }

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['display_profile'] = ($request->get('display_profile')) ? (int)$request->get('display_profile') : 0;

        // add audio
        $path = public_path().'/uploads/audio';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // upload audio song
        if ($request->file('audio')) {
            $file = $request->file('audio');
            $name = $file->getClientOriginalName();
            $audio_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/audio/', $audio_path);
            //store audio file into directory and db
            $input['audio'] = $audio_path;
        }


        $path = public_path().'/uploads/track_thumbnail';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // upload track song
        if ($request->file('track_thumbnail')) {
            $file = $request->file('track_thumbnail');
            $name = $file->getClientOriginalName();
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/track_thumbnail/', $image_path);
            //store image file into directory and db
            $input['track_thumbnail'] = $image_path;
        }
        $track = ArtistTrack::create($input);

        // create artist track links
        if(!empty($request->link))
        {
            foreach($request->link as $link)
            {
                ArtistTrackLink::create([
                    'artist_track_id' => $track->id,
                    'link' => $link,
                ]);
            }
        }

        // create artist track language
        if(!empty($request->language))
        {
            foreach($request->language as $language)
            {
                ArtistTrackLanguage::create([
                    'artist_track_id' => $track->id,
                    'language_id' => $language,
                ]);
            }
        }

        // track tags store
        if(!empty($request->tag)){
            foreach($request->tag as $tag)
            {
                $input['user_id']                = auth()->user()->id;
                $input['curator_feature_tag_id'] = (int) $tag;
                $track->artistTrackTags()->create($input);
            }
        }

        return response()->json('Song Track created successfully.');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function favoriteCurator(Request $request)
    {
        if($request->ajax())
        {
            if (!empty($request->curator_id))
            {
                $curator_ID = base64_decode($request->curator_id);
                # if record exists in database
                $artistFavoriteCurator = ArtistFavoriteCurator::where(['artist_id' => Auth::id(), 'curator_id' => $curator_ID])->first();
                if(!empty($artistFavoriteCurator))
                {
                    $artistFavoriteCurator->forceDelete();
                    return response()->json([
                        'success' => 'Curator Updated successfully',
                        'reload_page'  => 'reload_page',
                        'curatorID'  => $curator_ID,
                        'requestFrom' => !empty($request->requestFrom) ? $request->requestFrom : '',
                    ]);
                }

                ArtistFavoriteCurator::create([
                    'artist_id'  => Auth::id(),
                    'curator_id' => $curator_ID,
                ]);
                return response()->json([
                    'success' => 'Curator Saved successfully',
                    'statusCurator'  => true,
                    'curatorID'  => $curator_ID,
                    'requestFrom' => !empty($request->requestFrom) ? $request->requestFrom : '',
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

<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\SubmitCoverage;
use App\Notifications\SendNotification;
use App\Templates\IOfferTemplateStatus;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmitCoverageController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function submitCoverage()
    {
        $submitCoverage = SubmitCoverage::where('curator_id', Auth::id())->get();
        return view('pages.curators.curator-coverage.coverage',get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function sendSubmitCoverage(Request $request)
    {
        if($request->ajax()){
            $submitCoverage     = SubmitCoverage::create([
                'curator_id'    => Auth::id(),
                'artist_id'     => $request->artistID,
                'track_id'      => $request->trackID,
                'campaign_id'   => $request->campaign_ID,
                'offer_type_id' => $request->offer_type_id,
                'links'         => json_encode($request->links),
                'message'       => $request->message,
                'submit_at'     => Carbon::now(),
                'status'        => IOfferTemplateStatus::COMPLETED,
            ]);

            // send notification
            $data   =   [
                'title' =>  Auth::user()->name.' (New Submit Coverage)',
                'link'  =>  url("/coverages"),
                'date'  =>  getDateFormat($submitCoverage->created_at),
            ];

            $params =   [
                'channel_name'  =>  'submit_coverage_notification',
                'data'          =>  $data,
            ];

            $user = !empty($submitCoverage->userArtist) ? $submitCoverage->userArtist : null;
            if(!empty($user))
            {
                $user->notify(new SendNotification($params));
            }

            return response()->json([
                'success' => 'Submit Coverage send successfully',
            ]);
        }else
        {
            return response()->json(['error' => 'Error In Ajax call.']);
        }
    }
}

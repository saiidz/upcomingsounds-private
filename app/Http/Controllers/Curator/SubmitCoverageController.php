<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\SubmitCoverage;
use App\Models\TransactionHistory;
use App\Notifications\SendNotification;
use App\Templates\IOfferTemplateStatus;
use App\Templates\IStatus;
use App\Templates\ITiers;
use App\Templates\IUserType;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
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
        $submitCoverages = SubmitCoverage::where('curator_id', Auth::id())->latest()->get();
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
                'offer_type_id' => null,
                'alternative_option_id' => $request->offer_type_id,
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

    /**
     * @param $submitCoverage
     * @return Application|Factory|View|void
     */
    public function viewSubmitCoverage($submitCoverage)
    {
        try {
            $submitCoverage = SubmitCoverage::find(decrypt($submitCoverage));
            return view('pages.curators.curator-coverage.submit-coverage-details', get_defined_vars());
        }catch (DecryptException $exception)
        {
            abort('403');
        }
    }

    public function storeUscSubmitCoverage(Request $request)
    {
        if($request->ajax()){
            if($request->usc_wallet)
            {
                $user = Auth::user();
                TransactionHistory::create([
                    'user_id'             => $user->id,
                    'user_type'           => $user->type,
                    'type'                => IUserType::DEPOSIT,
                    'transaction_user_id' => !empty($user->transactionUserInfo) ? $user->transactionUserInfo->id : null,
                    'amount'              => $request->usc_wallet,
                    'payment_status'      => IStatus::COMPLETED,
                    'paid_at'             => Carbon::now(),
                    'submit_coverage'     => 1,
                    'details'             => json_encode($request->usc_wallet),
                ]);
            }

            // delete submit coverage
            SubmitCoverage::where('curator_id',$user->id)->delete();
            return response()->json([
                'success' => 'Add to Wallet send successfully',
            ]);
        }else
        {
            return response()->json(['error' => 'Error In Ajax call.']);
        }
    }
}

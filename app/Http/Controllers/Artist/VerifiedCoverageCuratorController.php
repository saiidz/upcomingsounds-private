<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Artist\VerifiedContentCreatorCurator;
use App\Models\ArtistTrack;
use App\Models\Curator\VerifiedCoverage;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class VerifiedCoverageCuratorController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getSelectedVerifiedCoverageCurator(Request $request)
    {
        # verifiedCoverageIDS is required
        if(empty($request->verifiedCoverageIDS))
        {
            return response()->json(['error' => 'Please select any verified coverage of curator']);
        }

        # track_id is required
        if(empty($request->track_id))
        {
            return response()->json(['error' => 'Track is required']);
        }

        $data = $request->input('verifiedCoverageIDS');
        // Decode the JSON string to an associative array
        $decodedArray = json_decode($data, true);

        # now sum of user credit
        $uscSelectedCreditSum = collect($decodedArray)->sum('usc_credit');

        $myBalance = User::artistBalance();

        # missing credits
        if ($uscSelectedCreditSum > $myBalance)
            $missingAmountUSC = $uscSelectedCreditSum - $myBalance;
        else
            $missingAmountUSC = 0;

        # find artist track
        $artistTrack = ArtistTrack::find($request->track_id);

        # get selected verified curator coverage Extracting IDs from the received data
        $ids = collect($decodedArray)->pluck('id')->toArray();

        # Retrieve records from the VerifiedCoverage model
        $verifiedCoverages = VerifiedCoverage::with('user','offerType')->whereIn('id', $ids)->get();

        # count of selected curator
        $countVerifiedCoverages = $verifiedCoverages->count();

//        $data = $verifiedCoverages->map(function ($item) {
//            return [
//                'id' => $item->id,
//                'usc_credit' => $item->contribution,
//            ];
//        });

        $selectedVerifiedCuratorList = view('pages.artists.artist-promote-your-track.form-wizard.__selected-verified-curator')->with([
            'uscSelectedCreditSum' => $uscSelectedCreditSum,
            'myBalance' => $myBalance,
            'artistTrack' => $artistTrack,
            'verifiedCoverages' => $verifiedCoverages,
            'countVerifiedCoverages' => $countVerifiedCoverages,
            'missingAmountUSC' => $missingAmountUSC,
        ])->render();

        return response()->json([
            'success' => 'You have selected '.$countVerifiedCoverages.' Verified Coverage Curators',
            'selectedVerifiedCurators' => $selectedVerifiedCuratorList,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function finalPaySelectedVerifiedCoverageCurator(Request $request)
    {
        try {
            # verifiedCoverageIDS is required
            if(empty($request->verifiedCoverageIDS))
            {
                return response()->json(['error' => 'Please select any verified coverage of curator']);
            }

            # track_id is required
            if(empty($request->track_id))
            {
                return response()->json(['error' => 'Track is required']);
            }

            $data = $request->input('verifiedCoverageIDS');
            // Decode the JSON string to an associative array
            $decodedArray = json_decode($data, true);

            # now sum of user credit
            $uscSelectedCreditSum = collect($decodedArray)->sum('usc_credit');

            $myBalance = User::artistBalance();

            if ($uscSelectedCreditSum > $myBalance)
            {
                # checkout amount
                $missingAmountUSC = $uscSelectedCreditSum - $myBalance;
                return response()->json([
                    'error_wallet' => 'You have insufficient '.$myBalance.'USC credits, please purchased missing credits '. $missingAmountUSC. 'USC credits',
                    'amount_USC' => $missingAmountUSC,
                ]);
            }

            # find artist track
            $artistTrack = ArtistTrack::find($request->track_id);

            # check track is existing
            if(empty($artistTrack))
                return response()->json(['error' => 'Track not found']);

            # get selected verified curator coverage Extracting IDs from the received data
            $ids = collect($decodedArray)->pluck('id')->toArray();

            # Retrieve records from the VerifiedCoverage model
            $verifiedCoverages = VerifiedCoverage::with('user','offerType')->whereIn('id', $ids)->get();

            # create records from the VerifiedContentCreatorCurator model
            foreach ($verifiedCoverages as $record)
            {
                VerifiedContentCreatorCurator::create([
                    'artist_id'            => Auth::id(),
                    'artist_track_id'      => $artistTrack->id,
                    'curator_id'           => $record->user_id,
                    'verified_coverage_id' => $record->id,
                    'usc_credit'           => $record->contribution,
                    'pay_now'              => 'yes',
                ]);
            }

            return response()->json([
                'success' => 'Verified Coverage Curators Send requests successfully created',
            ]);
        }catch (Exception $exception)
        {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}

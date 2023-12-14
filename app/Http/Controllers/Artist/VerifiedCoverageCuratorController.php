<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\ArtistTrack;
use App\Models\Curator\VerifiedCoverage;
use App\Models\User;
use Illuminate\Http\Request;

class VerifiedCoverageCuratorController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
//
        $myBalance = User::artistBalance();
//        if ($uscCreditSum > $myBalance)
//            return response()->json(['error_wallet' => 'You have insufficient '.$myBalance.'USC credits, please go to wallet and purchased credits']);


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

//        dd($countVerifiedCoverages,$verifiedCoverages,$artistTrack,$decodedArray,$request->all());
        $selectedVerifiedCuratorList = view('pages.artists.artist-promote-your-track.form-wizard.__selected-verified-curator')->with([
            'uscSelectedCreditSum' => $uscSelectedCreditSum,
            'myBalance' => $myBalance,
            'artistTrack' => $artistTrack,
            'verifiedCoverages' => $verifiedCoverages,
            'countVerifiedCoverages' => $countVerifiedCoverages,
        ])->render();

        return response()->json([
            'success' => 'You have selected '.$countVerifiedCoverages.' Verified Coverage Curators',
            'selectedVerifiedCurators' => $selectedVerifiedCuratorList,
        ]);
    }
}

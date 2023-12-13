<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifiedCoverageCuratorController extends Controller
{
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

        // Now $decodedArray contains the associative array
        dd($decodedArray,$request->all());
    }
}

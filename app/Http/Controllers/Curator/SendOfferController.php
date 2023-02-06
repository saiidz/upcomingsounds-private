<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\SendOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendOfferController extends Controller
{
    public function sendOffer(Request $request)
    {
        if($request->ajax()){
            if ($request->offer_template_ID)
            {
                SendOffer::create([
                    'curator_id'  => Auth::id(),
                    'offer_template_id' => $request->offer_template_ID,
                    'artist_id' => $request->artistID,
                    'track_id' => $request->trackID,
                    'expiry_date' => $request->offer_expiry,
                    'publish_date' => $request->offer_publish,
                ]);
                return response()->json([
                    'success' => 'Offer send successfully',
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

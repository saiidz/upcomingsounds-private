<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function activeCampaign()
    {
        $campaigns = Campaign::where('user_id',Auth::id())->latest()->get();
        return view('pages.artists.artist-active-campaign.active-campaign',get_defined_vars());
    }

    /**
     * @param Campaign $campaign
     * @return JsonResponse
     */
    public function destroy(Campaign $campaign)
    {
        //campaign delete
        $campaign->delete();
//        $campaign->forceDelete();
        return response()->json([
            'success' => 'Campaign deleted! successfully',
        ]);
    }
}

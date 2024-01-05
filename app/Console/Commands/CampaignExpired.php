<?php

namespace App\Console\Commands;

use App\Models\Campaign;
use App\Models\SendOffer;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CampaignExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaign:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is for campaign expired after time period of campaign.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate = Carbon::now();

        $campaigns = Campaign::whereNotNull('track_id')->where('is_expired_campaign',0)
                                ->whereDate('is_expired_campaign_date', '<', $currentDate)
                                ->doesntHave('curatorFavoriteTrack')
                                ->latest()->get();

        $campaigns = $campaigns->each(function ($campaign) use ($currentDate) {
                            $campaign->update(['is_expired_campaign' => 1]);
                        });
        Log::info('success');
        Log::info(json_encode($campaigns));
    }
}

<?php

namespace App\Console\Commands;

use App\Models\SendOffer;
use App\Templates\IOfferTemplateStatus;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ExpiredSendOffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendOffer:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Offer Expired';

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
        // get all offers
        $send_offers = SendOffer::where('status' , IOfferTemplateStatus::PENDING)->get();

        if(!empty($send_offers))
        {
            Log::info('send_offers for expired');
            Log::info(json_encode($send_offers));

            foreach ($send_offers as $send_offer)
            {
                $date = date("Y-m-d");
                $expiredDate = "2023-03-05";

                if($date > $expiredDate)
                {
                    $send_offer->update([
                        'status' => IOfferTemplateStatus::EXPIRED,
                    ]);
                    Log::info('date expired');
                    Log::info(json_encode($send_offer));
                }
            }
        }
    }
}

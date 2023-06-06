<?php

namespace App\Console\Commands;

use App\Models\SubmitCoverage;
use App\Models\TransactionHistory;
use App\Templates\IStatus;
use App\Templates\ITiers;
use App\Templates\IUserType;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClearMonthlySubmitCoverage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'submitCoverage:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is for submit coverage clear monthly';

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
        $submit_coverages = SubmitCoverage::get()->groupBy('curator_id');
        Log::info('Submit Coverage Collection Group By');
        Log::info(json_encode($submit_coverages));

        foreach ($submit_coverages as $key => $submit_coverage)
        {
            $countSubmitCoverages = $submit_coverage->count();
            $amount = 0;
            if($countSubmitCoverages > 0)
            {
                if ($countSubmitCoverages >= ITiers::TEARS_ONE && $countSubmitCoverages < 900)
                {
                    if($countSubmitCoverages >= 500)
                    {
                        $amount = 25;
                    }
                }elseif ($countSubmitCoverages >= 900 && $countSubmitCoverages < 1200)
                {
                    if($countSubmitCoverages >= 900)
                    {
                        $amount = 45;
                    }
                }elseif ($countSubmitCoverages >= 1200 && $countSubmitCoverages < 1400)
                {
                    if ($countSubmitCoverages >= 1200)
                    {
                        $amount = 63;
                    }
                }elseif ($countSubmitCoverages >= 1400 && $countSubmitCoverages < 1550)
                {
                    if ($countSubmitCoverages >= 1400)
                    {
                        $amount = 79;
                    }
                }elseif ($countSubmitCoverages <= 1550)
                {
                    if ($countSubmitCoverages >= 1550)
                    {
                        $amount = 91;
                    }
                }

                // add wallet in curator balance
                if($amount > 0)
                {
                    $user = \App\Models\User::where('id',$key)->first();
                    $transactionHistory = TransactionHistory::create([
                        'user_id'             => !empty($user) ? $user->id : null,
                        'user_type'           => !empty($user) ? $user->type : null,
                        'type'                => IUserType::DEPOSIT,
                        'transaction_user_id' => !empty($user->transactionUserInfo) ? $user->transactionUserInfo->id : null,
                        'amount'              => $amount,
                        'payment_status'      => IStatus::COMPLETED,
                        'paid_at'             => Carbon::now(),
                        'submit_coverage'     => 1,
                        'details'             => json_encode($amount),
                    ]);
                    Log::info('Transaction History Submit Coverage Created');
                    Log::info(json_encode($transactionHistory));
                }
            }
        }
        // all done submit coverage delete
        $submit_coverages = SubmitCoverage::pluck('curator_id')->toArray();
        Log::info('Submit Coverage Deleted IDs');
        Log::info(json_encode($submit_coverages));
        SubmitCoverage::whereIn('curator_id',$submit_coverages)->delete();
    }
}

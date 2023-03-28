<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\UserReferred;
use App\Models\ReferralLink;
use App\Templates\IStatus;
use Illuminate\Support\Carbon;
use App\Models\CuratorTransfer;
use App\Models\TransactionHistory;
use App\Models\TransactionUserInfo;
use App\Models\ReferralRelationship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RewardUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserReferred  $event
     * @return void
     */
    public function handle(UserReferred $event)
    {
        if(!empty($event->referralId))
        {
            $referral = ReferralLink::find($event->referralId);
            if (!is_null($referral)) {
                ReferralRelationship::create(['referral_link_id' => $referral->id, 'user_id' => $event->user->id]);

                // Example...
                if ($referral->program->name === 'Sign-up Bonus') {
                    // User who was sharing link
                    $provider = $referral->user;
                    // add 10 credit
                    if(!empty($provider))
                    {

                    // check record is already exists
                    $curator_billing_info_exist = TransactionUserInfo::where('user_id',Auth::id())->first();

                        if(isset($curator_billing_info_exist))
                        {

                            $transactionUser = $curator_billing_info_exist->update([
                                'user_id'      => $curator_billing_info_exist->id,
                                'first_name'   => $curator_billing_info_exist->name,
                                'phone_number' => $curator_billing_info_exist->phone_number,
                                'address'      => $curator_billing_info_exist->address,
                            ]);
                        }else{
                            $transactionUser = TransactionUserInfo::create([
                                'user_id'      => $provider->id,
                                'first_name'   => $provider->name,
                                'phone_number' => $provider->phone_number,
                                'address'      => $provider->address,
                            ]);
                        }

                        TransactionHistory::create([
                            'user_id'             => $transactionUser->user_id,
                            'user_type'           => 'curator',
                            'transaction_user_id' => $transactionUser->id,
                            'credits'             => '10',
                            'payment_status'      => IStatus::PENDING,
//                            'payment_status'      => 'completed',
                            'paid_at'             => Carbon::now(),
                        ]);
                    }
                    // $provider->addCredits(15);
                    // User who used the link
                    // $user = $event->user;
                    // // dd($user);
                    // $user->addCredits(20);
                }

            }
        }
    }
}

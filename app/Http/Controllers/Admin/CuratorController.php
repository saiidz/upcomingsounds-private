<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Templates\IMessageTemplates;
use App\Models\CuratorVerificationForm;

class CuratorController extends Controller
{
    /**
     * approvedCurator function
     *
     * @return void
     */

    public function approvedCurator()
    {
        $approved_curators = User::GetApprovedCurators()->latest()->get();
        return view('admin.pages.curators.curator_approved', get_defined_vars());
    }

     /**
     * pendingCurator function
     *
     * @return void
     */

    public function pendingCurator()
    {
        $pending_curators = User::GetPendingCurators()->latest()->get();
        return view('admin.pages.curators.curator_pending', get_defined_vars());
    }

    /**
     * profileCurator function
     *
     * @return void
     */

    public function profileCurator(User $user)
    {
        return view('admin.pages.curators.curator_view', get_defined_vars());
    }

    /**
     * verificationCurator function
     *
     * @return void
     */

    public function verificationCurator()
    {
        $user_curators = User::with('curatorVerificationForm')->where('is_approved',1)->where('type','curator')->get();
        // $verification_curators = CuratorVerificationForm::latest()->get();;
        return view('admin.pages.curators.curator_verification', get_defined_vars());
    }

     /**
     * storeApprovedCurator function
     *
     * @return void
     */

    public function storeApprovedCurator(User $user)
    {
        if(!empty($user))
        {
            $user->update([
                'is_approved' => 1
            ]);
        }
        return redirect()->back()->with('success','Curator Approved successfully');
    }

    /**
     * curatorVerifcationShow function
     *
     * @return void
     */

    public function curatorVerifcationShow(User $user)
    {
        if(!empty($user))
        {
            $verification_curators = CuratorVerificationForm::where('user_id',$user->id)->latest()->get();
            return view('admin.pages.curators.curator_verification_view', get_defined_vars());
        }else{
            return redirect()->back();
        }

    }

    /**
     * storeVerifiedCurator function
     *
     * @return void
     */

    public function storeVerifiedCurator(User $user)
    {
        if(!empty($user))
        {
            $user->update([
                'is_verified' => 1
            ]);

            if($user->phone_number)
            {
                Helper::twilioOtp($user->phone_number, IMessageTemplates::CURATORVERIFYMESSAGE);
            }
        }
        return redirect()->back()->with('success','Curator Verified successfully');
    }

    /**
     * storeRejectedCurator function
     *
     * @return void
     */

    public function storeRejectedCurator(User $user)
    {

        if(!empty($user))
        {
            if(!empty($user->curatorVerificationForm))
            {
                $count_apply = $user->curatorVerificationForm->last()->apply_count;

                if($count_apply == 3)
                {
                    $user->update([
                        'is_rejected' => 1
                    ]);

                    if($user->phone_number)
                        Helper::twilioOtp($user->phone_number, IMessageTemplates::CURATORREJECTEDCOMPLETEDMESSAGE);
                }else{
                    if($user->phone_number)
                        Helper::twilioOtp($user->phone_number, IMessageTemplates::CURATORREJECTEDMESSAGE);

                }
            }

        }
        return redirect()->back()->with('success','Curator Rejected successfully and send message to curator.');
    }
}

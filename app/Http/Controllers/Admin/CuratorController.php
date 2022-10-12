<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $verification_curators = CuratorVerificationForm::latest()->get();
        return view('admin.pages.curators.curator_verification', get_defined_vars());
    }
}

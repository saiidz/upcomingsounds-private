<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curator\VerifiedCoverage;
use App\Models\User;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class VerifiedCoverageController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function curatorVerifiedCoverage()
    {
        $curatorsVerifiedCoverages = User::with('curatorVerifiedCoverage')
                                        ->whereHas('curatorVerifiedCoverage')
                                        ->GetApprovedCurators()->latest()->get();
        return view('admin.pages.curator-verified-coverage.curator-verified-coverage', get_defined_vars());
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function verifiedCoverage(User $user)
    {
        $verifiedCoverages = VerifiedCoverage::where('user_id', $user->id)->latest()->get();
        return view('admin.pages.curator-verified-coverage.index', get_defined_vars());
    }

    /**
     * @param VerifiedCoverage $verified_coverage
     * @return Application|Factory|View
     */
    public function showVerifiedCoverage(VerifiedCoverage $verified_coverage)
    {
        return view('admin.pages.curator-verified-coverage.verified-coverage-view', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param VerifiedCoverage $verified_coverage
     * @return JsonResponse
     */
    public function storeApprovedVerifiedCoverage(Request $request,VerifiedCoverage $verified_coverage)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($verified_coverage))
        {
            # Deactivate the previous record
            VerifiedCoverage::where([
                'user_id' => $verified_coverage->user_id,
                'is_active' => 1
            ])->update(['is_active' => 0]);

            User::where('id', $verified_coverage->user_id)->update([
                'is_public_profile' => 1,
            ]);

            $verified_coverage->update([
                'is_active'   => 1,
                'is_approved' => 1,
                'is_rejected' => 0,
            ]);

            $data['email'] = $verified_coverage->user->email;
            $data['username'] = $verified_coverage->user->name;
            $data["title"] = "Approved Verified Coverage Upcoming Sounds";
            $data['approvedMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.curator_email.send_approved_email_to_curator', $data, function($message)use($data) {
                    $message->from('gary@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return response()->json(['success' => 'Verified Coverage Approved successfully and send email to Curator.']);
    }

    /**
     * @param Request $request
     * @param VerifiedCoverage $verified_coverage
     * @return JsonResponse
     */
    public function storeRejectVerifiedCoverage(Request $request,VerifiedCoverage $verified_coverage)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($verified_coverage))
        {
            $verified_coverage->update([
                'is_approved'   => 0,
                'is_rejected'   => 1,
                'reason_reject' => $request->description_details ?? null,
            ]);

            $data['email'] = $verified_coverage->user->email;
            $data['username'] = $verified_coverage->user->name;
            $data["title"] = "Reject Verified Coverage Upcoming Sounds";
            $data['rejectMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.curator_email.send_reject_email_to_curator', $data, function($message)use($data) {
                    $message->from('no_reply@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return response()->json(['success' => 'Verified Coverage Reject successfully and send email to Curator.']);
    }

}

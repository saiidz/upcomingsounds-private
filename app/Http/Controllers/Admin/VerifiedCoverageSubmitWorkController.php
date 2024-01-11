<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist\VerifiedContentCreatorCurator;
use App\Models\Curator\VerifiedCoverageSubmitWork;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class VerifiedCoverageSubmitWorkController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function submitWork()
    {
        $submitWorks = VerifiedCoverageSubmitWork::latest()->get();
        return view('admin.pages.verified-coverage-submit-work.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function detailSubmitWork(VerifiedCoverageSubmitWork $submitWork)
    {
        return view('admin.pages.verified-coverage-submit-work.submit-work-view', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param VerifiedCoverageSubmitWork $submitWork
     * @return JsonResponse
     */
    public function storeApprovedSubmitWork(Request $request,VerifiedCoverageSubmitWork $submitWork)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($submitWork))
        {
            $submitWork->update([
                'status' => IOfferTemplateStatus::APPROVED,
            ]);

            # update VerifiedContentCreatorCurator table
            $VerifiedContentCreatorCurator = VerifiedContentCreatorCurator::where('id', $submitWork->verified_content_creator_id)->latest()->first();

            $VerifiedContentCreatorCurator->update([
                'usc_fee_commission' => IOfferTemplateStatus::USC_FEE_COMMISSION_ADMIN,
                'is_approved'        => 1,
                'is_rejected'        => 0,
            ]);

            $data['email'] = $submitWork->user->email;
            $data['username'] = $submitWork->user->name;
            $data["title"] = "Submit Work Completed Verified Coverage Upcoming Sounds";
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
        return response()->json(['success' => 'Submit Work Completed successfully and send email to Curator.']);
    }

    /**
     * @param Request $request
     * @param VerifiedCoverageSubmitWork $submitWork
     * @return JsonResponse
     */

    public function storeRejectSubmitWork(Request $request,VerifiedCoverageSubmitWork $submitWork)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($submitWork))
        {
            $submitWork->update([
                'status' => IOfferTemplateStatus::REJECTED,
            ]);

            // update VerifiedContentCreatorCurator table
            $VerifiedContentCreatorCurator = VerifiedContentCreatorCurator::where('id', $submitWork->verified_content_creator_id)->latest()->first();
            $VerifiedContentCreatorCurator->update([
                'is_approved' => 0,
                'is_rejected' => 1,
            ]);

            $data['email'] = $submitWork->user->email;
            $data['username'] = $submitWork->user->name;
            $data["title"] = "Submit Work Completed Verified Coverage Upcoming Sounds";
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

        return response()->json(['success' => 'Submit Work Completed successfully and send email to Curator.']);
    }

    /**
     * @param Request $request
     * @param VerifiedCoverageSubmitWork $submitWork
     * @return JsonResponse
     */

    public function artistRefundWaller(Request $request,VerifiedCoverageSubmitWork $submitWork)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($submitWork))
        {
            $submitWork->update([
                'status' => IOfferTemplateStatus::REJECTED,
            ]);

            // update $VerifiedContentCreatorCurator table

            $VerifiedContentCreatorCurator = VerifiedContentCreatorCurator::where('id', $submitWork->verified_content_creator_id)->latest()->first();

            $VerifiedContentCreatorCurator->update([
                'status'         => IOfferTemplateStatus::REFUND,
                'refund_message' => $request->description_details ?? null,
            ]);

            $data['email'] = $submitWork->verifiedContentCreatorCurator->artistUser->email;
            $data['username'] = $submitWork->verifiedContentCreatorCurator->artistUser->name;
            $data["title"] = "Artist Refund Verified Coverage Upcoming Sounds";
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

        return response()->json(['success' => 'Artist Refund successfully and send email to Artist.']);
    }
}

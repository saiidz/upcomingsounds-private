<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curator\SubmitWork;
use App\Models\SendOffer;
use App\Models\SendOfferTransaction;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubmitWorkController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function submitWork()
    {
        $submitWorks = SubmitWork::latest()->get();
        return view('admin.pages.submit-work.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function detailSubmitWork(SubmitWork $submitWork)
    {
//        dd($submitWork->sendOffer->curatorOfferTemplate);
        return view('admin.pages.submit-work.submit-work-view', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param SubmitWork $submitWork
     * @return JsonResponse
     */
    public function storeApprovedSubmitWork(Request $request,SubmitWork $submitWork)
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

            // update SendOfferTransaction table
            $SendOfferTransaction = SendOfferTransaction::where(['send_offer_id' => $submitWork->send_offer_id, 'curator_id' => $submitWork->curator_id])->latest()->first();
            $SendOfferTransaction->update([
                'is_approved' => 1,
                'is_rejected' => 0,
            ]);

            // update send offer table
            $submitWork->sendOffer()->update([
                'status'  => IOfferTemplateStatus::COMPLETED,
                'message' => $request->description_details ?? null,
            ]);


            $data['email'] = $submitWork->user->email;
            $data['username'] = $submitWork->user->name;
            $data["title"] = "Submit Work Completed Offer Upcoming Sounds";
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
     * @param SubmitWork $submitWork
     * @return JsonResponse
     */

    public function storeRejectSubmitWork(Request $request,SubmitWork $submitWork)
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

            // update SendOfferTransaction table
            $SendOfferTransaction = SendOfferTransaction::where(['send_offer_id' => $submitWork->send_offer_id, 'curator_id' => $submitWork->curator_id])->latest()->first();
            $SendOfferTransaction->update([
                'is_approved' => 0,
                'is_rejected' => 1,
            ]);

            // update send offer table
            $submitWork->sendOffer()->update([
                'status'  => IOfferTemplateStatus::COMPLETED,
                'message' => $request->description_details ?? null,
            ]);


            $data['email'] = $submitWork->user->email;
            $data['username'] = $submitWork->user->name;
            $data["title"] = "Submit Work Completed Offer Upcoming Sounds";
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
     * @param SubmitWork $submitWork
     * @return JsonResponse
     */

    public function artistRefundWaller(Request $request,SubmitWork $submitWork)
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

            // update SendOfferTransaction table
            $SendOfferTransaction = SendOfferTransaction::where(['send_offer_id' => $submitWork->send_offer_id, 'artist_id' => $submitWork->sendOffer->artist_id])->latest()->first();
            $SendOfferTransaction->update([
                'status'         => IOfferTemplateStatus::REFUND,
                'refund_message' => $request->description_details ?? null,
            ]);

            // update send offer table
            $submitWork->sendOffer()->update([
                'status'  => IOfferTemplateStatus::COMPLETED,
            ]);


            $data['email'] = $submitWork->sendOffer->userArtist->email;
            $data['username'] = $submitWork->sendOffer->userArtist->name;
            $data["title"] = "Artist Refund Offer Upcoming Sounds";
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

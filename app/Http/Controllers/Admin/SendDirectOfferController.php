<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CuratorOfferTemplate;
use App\Models\SendOffer;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SendDirectOfferController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function sendDirectOffer()
    {
        $offerTemplates = CuratorOfferTemplate::where('type', IOfferTemplateStatus::TYPE_DIRECT_OFFER)->latest()->get();
        return view('admin.pages.direct-send-offer-template.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function detailSendOfferTemplate(CuratorOfferTemplate $offer_template)
    {
        return view('admin.pages.direct-send-offer-template.offer-view', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param CuratorOfferTemplate $offer_template
     * @return JsonResponse
     */
    public function storeDirectApprovedOfferTemplate(Request $request,CuratorOfferTemplate $offer_template)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($offer_template))
        {
            $offer_template->update([
                'is_approved' => 1,
                'is_rejected' => 0,
                'reason_reject' => $request->description_details ?? null,
            ]);

            // update send offer table
            $sendOffer = SendOffer::where(['curator_id' => $offer_template->user_id, 'offer_template_id' => $offer_template->id])->latest()->first();
            $sendOffer->update([
                'is_approved' => 1,
                'is_rejected' => 0,
            ]);

            $data['email'] = $offer_template->user->email;
            $data['username'] = $offer_template->user->name;
            $data["title"] = "Approved Offer Upcoming Sounds";
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
        return response()->json(['success' => 'Offer Approved successfully and send email to Curator and send to artist offer']);
    }

    /**
     * @param Request $request
     * @param CuratorOfferTemplate $offer_template
     * @return JsonResponse
     */

    public function storeDirectRejectOfferTemplate(Request $request,CuratorOfferTemplate $offer_template)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($offer_template))
        {
            $offer_template->update([
                'is_approved' => 0,
                'is_rejected' => 1,
                'reason_reject' => $request->description_details ?? null,
            ]);

            // update send offer table
            $sendOffer = SendOffer::where(['curator_id' => $offer_template->user_id, 'offer_template_id' => $offer_template->id])->latest()->first();
            $sendOffer->update([
                'is_approved' => 1,
                'is_rejected' => 0,
            ]);

            $data['email'] = $offer_template->user->email;
            $data['username'] = $offer_template->user->name;
            $data["title"] = "Reject Offer Upcoming Sounds";
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

        return response()->json(['success' => 'Offer Reject successfully and send email to Curator and send to artist offer']);
    }}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CuratorOfferTemplate;
use App\Models\OfferType;
use App\Models\User;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OfferTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer_types = OfferType::latest()->get();
        return view('admin.pages.offer-type.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.offer-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input         = $request->all();
        $input['name'] = $request->get('name');

        OfferType::create($input);

        return response()->json(['success' => 'OfferType created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer_type = OfferType::find($id);

        return view('admin.pages.offer-type.create', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input         = $request->all();
        $input['name'] = $request->get('name');

        $offer_type = OfferType::find($id);

        $offer_type->update($input);

        return response()->json(['success' => 'OfferType updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer_type = OfferType::find($id);

        $offer_type->delete();
        return redirect()->back()->with('success','OfferType deleted successfully');
    }

    /**
     * @return Application|Factory|View
     */
    public function offers()
    {
        $curatorsOfferTemplates = User::with('curatorOfferTemplateOffer')->whereHas('curatorOfferTemplateOffer', function ($q){
            $q->where('type', IOfferTemplateStatus::TYPE_OFFER);
        })->GetApprovedCurators()->latest()->get();
        return view('admin.pages.offer-template.curator-offer-template', get_defined_vars());
//        return view('admin.pages.offer-template.index', get_defined_vars());
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function curatorOfferTemplate(User $user)
    {
        $offerTemplates = CuratorOfferTemplate::where(['user_id' => $user->id,'type' => IOfferTemplateStatus::TYPE_OFFER])->latest()->get();
        return view('admin.pages.offer-template.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function offerTemplate(CuratorOfferTemplate $offer_template)
    {
        return view('admin.pages.offer-template.offer-view', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param CuratorOfferTemplate $offer_template
     * @return JsonResponse
     */
    public function storeApprovedOfferTemplate(Request $request,CuratorOfferTemplate $offer_template)
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
            ]);

            $data['email'] = $offer_template->user->email;
            $data['username'] = $offer_template->user->name;
            $data["title"] = "Approved Offer Template Upcoming Sounds";
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
        return response()->json(['success' => 'Offer Template Approved successfully and send email to Curator.']);
    }

    /**
     * @param Request $request
     * @param CuratorOfferTemplate $offer_template
     * @return JsonResponse
     */

    public function storeRejectOfferTemplate(Request $request,CuratorOfferTemplate $offer_template)
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
            ]);

            $data['email'] = $offer_template->user->email;
            $data['username'] = $offer_template->user->name;
            $data["title"] = "Reject Offer Template Upcoming Sounds";
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
        return response()->json(['success' => 'Offer Template Reject successfully and send email to Curator.']);
    }

    /**
     * @param CuratorOfferTemplate $offer_template
     * @return RedirectResponse
     */
    public function destroyOfferTemplate(CuratorOfferTemplate $offer_template)
    {
        //Offer Template delete
        $offer_template->forceDelete();
        return redirect()->back()->with('success','Offer Template deleted! successfully');
    }

}

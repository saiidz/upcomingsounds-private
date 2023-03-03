<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\AlternativeOption;
use App\Models\Campaign;
use App\Models\CuratorOfferTemplate;
use App\Models\OfferType;
use App\Models\SendOffer;
use App\Models\User;
use App\Templates\IMessageTemplates;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OfferTemplateController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $offerTemplates = CuratorOfferTemplate::where(['user_id' => Auth::id(), 'type' => IOfferTemplateStatus::TYPE_OFFER])->get();
        return view('pages.curators.curator-offer-template.proposition', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $offer_types = OfferType::get();
        $alternative_options = AlternativeOption::get();
        return view('pages.curators.curator-offer-template.create', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeOfferTemplate(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'confirm'             => "required",
            'publish_date'        => (empty($request->publish_date) && !empty($request->directOffer)) ? "required" : '',
            'expiry_date'         => (empty($request->publish_date) && !empty($request->directOffer)) ? "required" : '',
            'alternative_option'  => "required",
            'contribution'        => "required|numeric",
            'description_details' => "required",
            'offer_type'          => "required",
            'title'               => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input = $request->all();
        $input['user_id'] = Auth::id();
        if(!empty($request->directOffer))
        {
            $input['type'] = IOfferTemplateStatus::TYPE_DIRECT_OFFER;
        }else{
            $input['type'] = IOfferTemplateStatus::TYPE_OFFER;
        }
        $input['is_active'] = IOfferTemplateStatus::IS_ACTIVE;
        $input['offer_text'] = $request->description_details ?? null;
        $curatorOfferTemplate = CuratorOfferTemplate::create($input);

        if(!empty($request->directOffer))
        {
            $campaign = Campaign::where('id', $request->campaign_id)->first();
            SendOffer::create([
                'curator_id'  => Auth::id(),
                'offer_template_id' => $curatorOfferTemplate->id,
                'artist_id' => !empty($campaign->user) ? $campaign->user->id : null,
                'track_id' => !empty($campaign->artistTrack) ? $campaign->artistTrack->id : null,
                'campaign_id' => $request->campaign_id,
                'expiry_date' => $request->expiry_date,
                'publish_date' => $request->publish_date,
                'is_approved' => 0,
            ]);
        }
        return response()->json([
            'success' => IMessageTemplates::OFFER_SUCCESS,
            'directOffer' => !empty($request->directOffer) ? IMessageTemplates::OFFER_DIRECT_SUCCESS : null,
        ]);
    }


    /**
     * @param CuratorOfferTemplate $offer_template
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        $offer_template = CuratorOfferTemplate::find($request->offer_id);
        return response()->json([
            'success' => 'success',
            'offer_template' => $offer_template,
            'offer_type' => !empty($offer_template) ? $offer_template->offerType : null,
            'alternative_option' => !empty($offer_template) ? $offer_template->alternativeOption : null,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function edit($offer_template)
    {
        $offer_template = CuratorOfferTemplate::find(decrypt($offer_template));
        $offer_types = OfferType::get();
        $alternative_options = AlternativeOption::get();
        return view('pages.curators.curator-offer-template.create', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param $offer_template
     * @return JsonResponse
     */
    public function updateOfferTemplate(Request $request, $offer_template)
    {
        $validator = Validator::make($request->all(), [
            'confirm'             => "required",
            'alternative_option'  => "required",
            'contribution'        => "required|numeric",
            'description_details' => "required",
            'offer_type'          => "required",
            'title'               => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $offer_template = CuratorOfferTemplate::find(decrypt($offer_template));
        $input = $request->all();

        $input['user_id'] = Auth::id();
        $input['type'] = IOfferTemplateStatus::TYPE_OFFER;
        $input['offer_text'] = $request->description_details ?? null;
        $input['is_approved'] = 0;
        $offer_template->update($input);
        return response()->json(['success' => IMessageTemplates::OFFER_UPDATED_SUCCESS]);
    }

    /**
     * @param CuratorOfferTemplate $offer_template
     * @return JsonResponse
     */
    public function destroy(CuratorOfferTemplate $offer_template)
    {
        //Offer Template delete
        $offer_template->delete();
        $offer_template->sendOffer->delete();
        return response()->json([
            'success' => 'Offer Template deleted! successfully',
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function offerChangeStatus(Request $request)
    {
        $curator_id = Auth::id();

        // update status public profile
        CuratorOfferTemplate::where(['id' => $request->offer_id, 'user_id' => $curator_id])->update([
            'is_active' => ($request->is_active == 'true') ? 1 : 0,
        ]);

        return response()->json([
            'success' => 'Offer Template status Is Updated',
            'is_active' => $artist->is_active ?? null,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function directCreateOfferTemplate(Request $request)
    {
        try {
            if(!empty($request->aid) && !empty($request->cid))
            {
                $user = User::find(decrypt($request->aid));
                $campaign = Campaign::find(decrypt($request->cid));
                $offer_types = OfferType::get();
                $alternative_options = AlternativeOption::get();
                return view('pages.curators.curator-offer-template.create-a-offer', get_defined_vars());
            }else{
                return abort(403);
            }
        }catch (DecryptException $exception)
        {
            return abort(403);
        }

    }
}

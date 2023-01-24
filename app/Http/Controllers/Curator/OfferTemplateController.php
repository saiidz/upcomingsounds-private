<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\AlternativeOption;
use App\Models\CuratorOfferTemplate;
use App\Models\OfferType;
use App\Templates\IMessageTemplates;
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
        $offerTemplates = CuratorOfferTemplate::all();
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
        $input['offer_text'] = $request->description_details ?? null;
        CuratorOfferTemplate::create($input);
        return response()->json(['success' => IMessageTemplates::OFFER_SUCCESS]);
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

    public function updateOfferTemplate(Request $request, $offer_template)
    {
        $validator = Validator::make($request->all(), [
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
        $input['offer_text'] = $request->description_details ?? null;
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
        $offer_template->forceDelete();
        return response()->json([
            'success' => 'Offer Template deleted! successfully',
        ]);
    }
}

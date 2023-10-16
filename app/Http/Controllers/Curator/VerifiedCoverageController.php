<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Curator\VerifiedCoverage;
use App\Models\OfferType;
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

class VerifiedCoverageController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $verifiedCoverages = VerifiedCoverage::where('user_id' , Auth::id())->get();
        return view('pages.curators.verified-coverage.verified-coverage', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $offer_types = OfferType::get();
        return view('pages.curators.verified-coverage.create', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeVerifiedCoverage(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'confirm'             => "required",
            'contribution'        => "required|numeric|between:1,100",
            'time_to_publish'     => "required",
            'offer_type'          => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['is_active'] = IOfferTemplateStatus::IS_ACTIVE;
        VerifiedCoverage::create($input);

        return response()->json([
            'success' => IMessageTemplates::VERIFIED_COVERAGE_SUCCESS,
        ]);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        $offer_template = VerifiedCoverage::find($request->offer_id);
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
    public function edit($verified_coverage)
    {
        try {
            $verified_coverage = VerifiedCoverage::find(decrypt($verified_coverage));
            $offer_types = OfferType::get();
            return view('pages.curators.verified-coverage.create', get_defined_vars());
        }catch (DecryptException $exception)
        {
            abort(404);
        }
    }

    /**
     * @param Request $request
     * @param $verified_coverage
     * @return JsonResponse
     */
    public function updateVerifiedCoverage(Request $request, $verified_coverage)
    {
        $validator = Validator::make($request->all(), [
            'confirm'             => "required",
            'contribution'        => "required|numeric|between:1,100",
            'time_to_publish'     => "required",
            'offer_type'          => "required",
        ]);

        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()->all()]);

        $verified_coverage = VerifiedCoverage::find(decrypt($verified_coverage));
        $input = $request->all();

        $input['user_id'] = Auth::id();
        $input['is_active'] = IOfferTemplateStatus::IS_ACTIVE;
        $input['is_approved'] = 0;
        $verified_coverage->update($input);
        return response()->json(['success' => IMessageTemplates::VERIFIED_COVERAGE_UPDATED_SUCCESS]);
    }

    /**
     * @param VerifiedCoverage $verified_coverage
     * @return JsonResponse
     */
    public function destroy(VerifiedCoverage $verified_coverage)
    {
        # Offer Template delete
        $verified_coverage->delete();
        return response()->json([
            'success' => 'Verified Coverage deleted! successfully',
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function verifiedCoverageChangeStatus(Request $request)
    {
        $curator_id = Auth::id();

        // update status public profile
        VerifiedCoverage::where(['id' => $request->verified_coverage_id, 'user_id' => $curator_id])->update([
            'is_active' => ($request->is_active == 'true') ? 1 : 0,
        ]);

        return response()->json([
            'success' => 'Verified Coverage status Is Updated',
        ]);
    }
}

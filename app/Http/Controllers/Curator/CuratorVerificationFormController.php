<?php

namespace App\Http\Controllers\Curator;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CuratorVerificationForm;
use App\Templates\IMessageTemplates;
use Illuminate\Support\Facades\Validator;

class CuratorVerificationFormController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVerificationForm(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'description_details' => "required",
            'information'         => "required",
            'image'               => "required|mimes:jpeg,jpg,png,pdf",
            'name'                => "required",
            'sub_curator_type'    => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $curator_verification_form = CuratorVerificationForm::where(['user_id' => Auth::id(), 'apply_count' => 3])->first();

        if(isset($curator_verification_form))
        {
            return response()->json(['error' => 'You have completed three chance. You cannot send again submit verification form.']);
        }

        $input                 = $request->all();
        $input['user_id']      = Auth::id();
        $input['descriptions'] = $request->get('description_details');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image_path = 'default_' . time() . $name;
            $file->move(public_path() . '/uploads/verification_form/', $image_path);
            //store image file into directory and db
            $input['image'] = $image_path;
        }

        // CuratorVerificationForm::updateorCreate([
        //     'user_id'   => Auth::id(),
        // ],$input);

        CuratorVerificationForm::create($input);

        if($request->get('phone_number'))
        {
            Helper::twilioOtp($request->get('phone_number'), IMessageTemplates::CURATORVERIFICATIONMESSAGE);
        }

        return response()->json(['success' => IMessageTemplates::CURATORVERIFICATIONMESSAGE]);
        // return response()->json(['success' => 'Verification Form Send successfully. We will contact you soon.']);
    }
}


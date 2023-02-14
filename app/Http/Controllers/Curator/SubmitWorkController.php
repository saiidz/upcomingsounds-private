<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Curator\SubmitWork;
use App\Models\Curator\SubmitWorkImage;
use App\Models\Curator\SubmitWorkLink;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SubmitWorkController extends Controller
{
    public function submitWork(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'completion_url.*' => 'required',
            'images.*'         => 'required|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($request->completion_url))
        {
            foreach ($request->completion_url as $link)
            {
                $check_link = str_contains($link, 'http') ? true : false;
                if ($check_link == false)
                {
                    return response()->json(['error' => 'Please add links not other stuff.']);
                }
            }
        }

        // create submit work
        $submitWork = SubmitWork::create([
            'curator_id'    => Auth::id(),
            'send_offer_id' => decrypt($request->send_offer_id),
            'status'        => IOfferTemplateStatus::PENDING,
        ]);

        // create submit work images
        // upload multiple images
        $path = public_path().'/uploads/submit_work_images';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file){
                $type = explode('/',$file->getClientMimeType());
                $name = str_replace(' ', '', $file->getClientOriginalName());
                $image_path = 'default_'.time().$name;
                $file->move(public_path() . '/uploads/submit_work_images/', $image_path);
                //store image file into directory and db
                SubmitWorkImage::create([
                    'submit_work_id' => $submitWork->id,
                    'path'           => $image_path,
                    'type'           => !empty($type[1]) ? $type[1] : null,
                ]);
            }
        }

        // create submit work links
        if(!empty($request->completion_url))
        {
            foreach($request->completion_url as $link)
            {
                SubmitWorkLink::create([
                    'submit_work_id' => $submitWork->id,
                    'link'           => $link,
                ]);
            }
        }

        return response()->json(['success' => 'Submit Work created successfully. Please wait for approval from admin side.']);
    }
}

<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Artist\VerifiedContentCreatorCurator;
use App\Models\Curator\VerifiedCoverageSubmitWork;
use App\Models\Curator\VerifiedCoverageSubmitWorkImage;
use App\Models\Curator\VerifiedCoverageSubmitWorkLink;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class VerifiedCoverageArtistController extends Controller
{
    /**
     * @var VerifiedContentCreatorCurator
     */
    private $verifiedContentCreatorCurator;

    /**
     * @param VerifiedContentCreatorCurator $verifiedContentCreatorCurator
     */
    public function __construct(VerifiedContentCreatorCurator $verifiedContentCreatorCurator)
    {
        $this->verifiedContentCreatorCurator = $verifiedContentCreatorCurator;
    }

    /**
     * @return Application|Factory|View
     */
    public function verifiedContentCreator()
    {
        $verifiedContentCreatorCurators = $this->verifiedContentCreatorCurator->where([
            'curator_id' => Auth::id(),
        ])->latest()->get();
        return view('pages.curators.verified-content-creator-artist.verified-content-creator', get_defined_vars());
    }

    /**
     * @param $verified_content_creator
     * @return Application|Factory|View
     */
    public function verifiedContentCreatorShow($verified_content_creator)
    {
        try {
            $verified_content_creator = $this->verifiedContentCreatorCurator->find(decrypt($verified_content_creator));
            return view('pages.curators.verified-content-creator-artist.verified-content-artist-details', get_defined_vars());
        }catch (DecryptException $exception)
        {
            abort('404','Not Found');
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
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
        $submitWork = VerifiedCoverageSubmitWork::create([
            'curator_id'    => Auth::id(),
            'verified_content_creator_id' => decrypt($request->verified_content_creator_id),
            'status'        => IOfferTemplateStatus::PENDING,
        ]);

        // create submit work images
        // upload multiple images
        $path = public_path().'/uploads/vc_submit_work_images';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file){
                $type = explode('/',$file->getClientMimeType());
                $name = str_replace(' ', '', $file->getClientOriginalName());
                $image_path = 'default_'.time().$name;
                $file->move(public_path() . '/uploads/vc_submit_work_images/', $image_path);
                //store image file into directory and db
                VerifiedCoverageSubmitWorkImage::create([
                    'verified_coverage_submit_work_id' => $submitWork->id,
                    'path'                             => $image_path,
                    'type'                             => !empty($type[1]) ? $type[1] : null,
                ]);
            }
        }

        // create submit work links
        if(!empty($request->completion_url))
        {
            foreach($request->completion_url as $link)
            {
                VerifiedCoverageSubmitWorkLink::create([
                    'verified_coverage_submit_work_id' => $submitWork->id,
                    'link'                             => $link,
                ]);
            }
        }

        return response()->json(['success' => 'Submit Work created successfully. Please wait for approval from admin side.']);
    }
}

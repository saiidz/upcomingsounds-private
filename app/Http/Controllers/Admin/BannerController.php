<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Templates\IPackages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $banners = Campaign::where('user_id', Auth::id())->latest()->get();
        return view('admin.pages.banners.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.banners.create');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
//            'track_description' => 'required',
            'link'              => 'url',
//            'link'              => 'required|url',
//            'track_name'        => 'required',
            'audio'             => 'file|mimes:mp3|max:15000',
            'track_thumbnail'   => 'mimes:jpeg,jpg,png',
//            'track_thumbnail'   => 'required|mimes:jpeg,jpg,png',
//            'artist_name'       => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input                      = $request->all();
        $input['user_id']           = Auth::id();
        $input['track_id']          = NULL;
        $input['package_name']      = IPackages::PREMIUM_NAME;
        $input['add_days']          = IPackages::ADD_DAYS;
        $input['add_remove_banner'] = IPackages::ADD_BANNER;

        // upload audio song
        if ($request->file('audio')) {
            $file = $request->file('audio');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $audio_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/audio/', $audio_path);
            //store audio file into directory and db
            $input['audio'] = $audio_path;
        }

        if ($request->file('track_thumbnail')) {
            $file = $request->file('track_thumbnail');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/track_thumbnail/', $image_path);
            //store image file into directory and db
            $input['track_thumbnail'] = $image_path;
        }

        Campaign::create($input);

        return response()->json(['success' => 'Banner created successfully.']);
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
        $banner = Campaign::where('id', $id)->first();
        return view('admin.pages.banners.create', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
//            'track_description' => 'required',
//            'track_name'        => 'required',
            'audio'             => 'file|mimes:mp3|max:15000',
            'track_thumbnail'   => 'mimes:jpeg,jpg,png',
//            'artist_name'       => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $banner = Campaign::where('id', $id)->first();

        $input             = $request->all();
        $input['user_id']  = Auth::id();
        $input['track_id'] = NULL;
        $input['package_name']      = IPackages::PREMIUM_NAME;
        $input['add_days']          = IPackages::ADD_DAYS;
        $input['add_remove_banner'] = IPackages::ADD_BANNER;

        // upload audio song
        if ($request->hasfile('audio')) {
            // delete audio previous
            if(!empty($banner->audio))
            {
                $audio = public_path('uploads/audio/' . $banner->audio);
                if(file_exists($audio)) {
                    unlink($audio);
                }
            }

            $file = $request->file('audio');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $audio_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/audio/', $audio_path);
            //store audio file into directory and db
            $input['audio'] = $audio_path;
        }else{
            $input['audio'] = $banner->audio;
        }

        if ($request->file('track_thumbnail')) {
            // delete thumbnail previous
            if(!empty($banner->track_thumbnail))
            {
                $image = public_path('uploads/track_thumbnail/' . $banner->track_thumbnail);
                if(file_exists($image)) {
                    unlink($image);
                }
            }

            $file = $request->file('track_thumbnail');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/track_thumbnail/', $image_path);
            //store image file into directory and db
            $input['track_thumbnail'] = $image_path;
        }else{
            $input['track_thumbnail'] = $banner->track_thumbnail;
        }

        $banner->update($input);

        return response()->json(['success' => 'Banner updated successfully.']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $banner = Campaign::where('id', $id)->first();
        if(!empty($banner))
            //track_thumbnail delete
            if(!empty($banner->track_thumbnail))
            {
                $image = public_path('uploads/track_thumbnail/' . $banner->track_thumbnail);
                if(file_exists($image)) {
                    unlink($image);
                }
            }

            //audio delete
            if(!empty($banner->audio))
            {
                $audio = public_path('uploads/audio/' . $banner->audio);
                if(file_exists($audio)) {
                    unlink($audio);
                }
            }

            $banner->forceDelete();

        return redirect()->back()->with('success','Banner deleted Successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroyThumbnail(Request $request)
    {
        $banner = Campaign::where('id', $request->campaign_id)->first();
        if(!empty($banner))
            //track_thumbnail delete
            if(!empty($banner->track_thumbnail))
            {
                $image = public_path('uploads/track_thumbnail/' . $banner->track_thumbnail);
                if(file_exists($image)) {
                    unlink($image);
                }
            }

            $banner->update([
                'track_thumbnail' => null
            ]);

        return response()->json(['success' => 'Thumbnail deleted Successfully.']);
    }
}

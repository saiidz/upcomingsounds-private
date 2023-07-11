<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeSliderController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $homeSliders = HomeSlider::latest()->get();
        return view('admin.pages.home-slider.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.home-slider.create');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'           => 'mimes:jpeg,jpg,png',
            'button_two_link' => 'required',
            'button_two_text' => 'required',
            'button_one_link' => 'required',
            'button_one_text' => 'required',
            'details'         => 'required',
            'title'           => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input           = $request->all();
        $input['status'] = $request->status;


        if ($request->file('image')) {
            $file = $request->file('image');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/home_slider/', $image_path);
            //store image file into directory and db
            $input['image'] = $image_path;
        }

        HomeSlider::create($input);

        return response()->json(['success' => 'Slider created successfully.']);
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
        $homeSlider = HomeSlider::where('id', $id)->first();
        return view('admin.pages.home-slider.create', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image'           => 'mimes:jpeg,jpg,png',
            'button_two_link' => 'required',
            'button_two_text' => 'required',
            'button_one_link' => 'required',
            'button_one_text' => 'required',
            'details'         => 'required',
            'title'           => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $homeSlider = HomeSlider::where('id', $id)->first();

        $input           = $request->all();
        $input['status'] = $request->status;


        if ($request->file('image')) {
            $file = $request->file('image');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/home_slider/', $image_path);
            //store image file into directory and db
            $input['image'] = $image_path;
        }else{
            $input['image'] = $homeSlider->image;
        }

        $homeSlider->update($input);

        return response()->json(['success' => 'Slider updated successfully.']);
    }

    /**
     * @param $id
     * @return RedirectResponse|void
     */
    public function destroy($id)
    {
        $homeSlider = HomeSlider::where('id', $id)->first();
        if(!empty($homeSlider))
        {
            //image delete
            if(!empty($homeSlider->image))
            {
                $image = public_path('uploads/home_slider/' . $homeSlider->image);
                if(file_exists($image)) {
                    unlink($image);
                }
            }

            $homeSlider->forceDelete();

            return redirect()->back()->with('success','Slider deleted Successfully');
        }
    }
}

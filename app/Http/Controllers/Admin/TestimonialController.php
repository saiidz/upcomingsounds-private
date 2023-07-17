<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.pages.testimonials.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.testimonials.create');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'           => 'mimes:jpeg,jpg,png',
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
            $file->move(public_path() . '/uploads/testimonials/', $image_path);
            //store image file into directory and db
            $input['image'] = $image_path;
        }

        Testimonial::create($input);

        return response()->json(['success' => 'Testimonial created successfully.']);
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
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        return view('admin.pages.testimonials.create', get_defined_vars());
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
            'details'         => 'required',
            'title'           => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $testimonial = Testimonial::where('id', $id)->first();

        $input           = $request->all();
        $input['status'] = $request->status;


        if ($request->file('image')) {
            $file = $request->file('image');
            $name = str_replace(' ', '', $file->getClientOriginalName());
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/testimonials/', $image_path);
            //store image file into directory and db
            $input['image'] = $image_path;
        }else{
            $input['image'] = $testimonial->image;
        }

        $testimonial->update($input);

        return response()->json(['success' => 'Testimonial updated successfully.']);
    }

    /**
     * @param $id
     * @return RedirectResponse|void
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        if(!empty($testimonial))
        {
            //image delete
            if(!empty($testimonial->image))
            {
                $image = public_path('uploads/testimonials/' . $testimonial->image);
                if(file_exists($image)) {
                    unlink($image);
                }
            }

            $testimonial->forceDelete();

            return redirect()->back()->with('success','Testimonial deleted Successfully');
        }
    }
}

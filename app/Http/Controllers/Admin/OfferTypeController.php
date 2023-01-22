<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfferType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
        dd('pending work');
    }
}

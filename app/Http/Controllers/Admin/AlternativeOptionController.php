<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlternativeOption;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlternativeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternative_options = AlternativeOption::latest()->get();
        return view('admin.pages.alternative-option.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.alternative-option.create');
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

        AlternativeOption::create($input);

        return response()->json(['success' => 'AlternativeOption created successfully.']);
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
        $alternative_option = AlternativeOption::find($id);

        return view('admin.pages.alternative-option.create', get_defined_vars());
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

        $offer_type = AlternativeOption::find($id);

        $offer_type->update($input);

        return response()->json(['success' => 'AlternativeOption updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer_type = AlternativeOption::find($id);

        $offer_type->delete();
        return redirect()->back()->with('success','AlternativeOption deleted successfully');
    }
}

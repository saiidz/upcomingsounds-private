<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CuratorFeature;
use App\Http\Controllers\Controller;
use App\Models\CuratorFeatureTag;
use App\Models\CuratorUserTag;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CuratorFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curator_features = CuratorFeature::latest()->get();
        return view('admin.pages.curator-features.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.curator-features.create');
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

        $input             = $request->all();
        $input['name']   = $request->get('name');

        CuratorFeature::create($input);

        return response()->json(['success' => 'Curator Feature created successfully.']);
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
    public function edit(CuratorFeature $curator_feature)
    {
        return view('admin.pages.curator-features.create', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CuratorFeature $curator_feature): JsonResponse
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

        $curator_feature->update($input);

        return response()->json(['success' => 'Curator Feature updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuratorFeature $curator_feature)
    {
        if(!empty($curator_feature->curatorFeatureTag) && count($curator_feature->curatorFeatureTag) > 0)
        {
            $sub_curator_feature_id = CuratorFeatureTag::where('curator_feature_id',$curator_feature->id)->pluck('id')->toArray();
            CuratorFeatureTag::whereIn('id',$sub_curator_feature_id)->delete();
        }
        $curator_feature->delete();
        return redirect()->back()->with('success','Curator Feature deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subFeature($id)
    {
        try {

            $curator_feature = CuratorFeature::find($id);
            if(isset($curator_feature))
            {
                $sub_features = CuratorFeatureTag::where('curator_feature_id',$curator_feature->id)->latest()->get();
                return view('admin.pages.curator-features.sub-features', get_defined_vars());
            }

        } catch (\Throwable $th) {
            return redirect()->back();
        }

    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSubFeature($id)
    {
        try {

            $curator_feature = CuratorFeature::find($id);
            if(isset($curator_feature))
            {
                return view('admin.pages.curator-features.create-sub-feature', get_defined_vars());
            }

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSubFeature(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input             = $request->all();
        $input['curator_feature_id']   = $request->get('curator_feature_id');
        $input['name']                 = $request->get('name');

        CuratorFeatureTag::create($input);

        return response()->json(['success' => 'Sub Curator Feature created successfully.']);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSubFeature($id)
    {
        try {

            $sub_curator_feature = CuratorFeatureTag::find($id);
            if(isset($sub_curator_feature))
            {
                $curator_feature = CuratorFeature::find($sub_curator_feature->curator_feature_id);
            }
            return view('admin.pages.curator-features.create-sub-feature', get_defined_vars());

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSubFeature(Request $request,$id): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        CuratorFeatureTag::where('id',$id)->update([
            'curator_feature_id' => $request->get('curator_feature_id'),
            'name'               => $request->get('name'),
        ]);
        return response()->json(['success' => 'Sub Curator Feature updated successfully.']);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSubFeature($id)
    {
        CuratorFeatureTag::where('id',$id)->delete();

        return redirect()->back()->with('success','Sub Curator Feature deleted successfully');
    }
}

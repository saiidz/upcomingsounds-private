<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\FeatureTag;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ArtistFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::latest()->get();
        return view('admin.pages.artist-features.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.artist-features.create');
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

        Feature::create($input);

        return response()->json(['success' => 'Feature created successfully.']);
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
        $feature = Feature::find($id);

        return view('admin.pages.artist-features.create', get_defined_vars());
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

        $feature = Feature::find($id);

        $feature->update($input);

        return response()->json(['success' => 'Feature updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Feature::find($id);

        if(!empty($feature->featureTags) && count($feature->featureTags) > 0)
        {
            $sub_feature_id = FeatureTag::where('feature_id',$feature->id)->pluck('id')->toArray();
            FeatureTag::whereIn('id',$sub_feature_id)->delete();
        }

        $feature->delete();
        return redirect()->back()->with('success','Feature deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subFeature($id)
    {
        try {

            $feature = Feature::find($id);
            if(isset($feature))
            {
                $sub_features = FeatureTag::where('feature_id',$feature->id)->latest()->get();
                return view('admin.pages.artist-features.sub-features', get_defined_vars());
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

            $feature = Feature::find($id);
            if(isset($feature))
            {
                return view('admin.pages.artist-features.create-sub-feature', get_defined_vars());
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

        $input               = $request->all();
        $input['feature_id'] = $request->get('feature_id');
        $input['name']       = $request->get('name');

        FeatureTag::create($input);

        return response()->json(['success' => 'Sub Artist Feature created successfully.']);
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

            $sub_feature = FeatureTag::find($id);
            if(isset($sub_feature))
            {
                $feature = Feature::find($sub_feature->feature_id);
            }
            return view('admin.pages.artist-features.create-sub-feature', get_defined_vars());

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
        FeatureTag::where('id',$id)->update([
            'feature_id' => $request->get('feature_id'),
            'name'       => $request->get('name'),
        ]);
        return response()->json(['success' => 'Sub Artist Feature updated successfully.']);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSubFeature($id)
    {
        FeatureTag::where('id',$id)->delete();

        return redirect()->back()->with('success','Sub Artist Feature deleted successfully');
    }
}

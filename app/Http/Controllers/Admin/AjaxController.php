<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * getStates
     */
    public function getStates(Request $request,$id)
    {
        $data['states'] = State::where('country_id',$id)->get();
        if($request->wantsJson()){
            return sendResponse($request->wantsJson(),null,$data,'Get States.',200);
        }else{
            return response()->json([
                'data' => $data,
            ]);
        }
    }

    /**
     * getCities
     */
    public function getCities(Request $request,$id)
    {
        $data['cities'] = City::where('state_id',$id)->get();
        if($request->wantsJson()){
            return sendResponse($request->wantsJson(),null,$data,'Get Cities.',200);
        }else{
            return response()->json([
                'data' => $data,
            ]);
        }
    }
}

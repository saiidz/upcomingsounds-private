<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * getCities
     */
    public function getCities(Request $request,$id)
    {
        $data['cities'] = City::where('country_id',$id)->get();
        return response()->json([
            'data' => $data,
        ]);
    }
}

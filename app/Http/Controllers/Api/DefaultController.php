<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DefaultController extends Controller
{
    /**
     * All Categories
     */
    public function getCategories(Request $request)
    {
        $data['categories'] = Category::all();
        return sendResponse($request->wantsJson(),null,$data,'Get Categories.',200);
    }
    /**
     * All Features Tags
     */
    public function getFeatureTags(Request $request)
    {
        $data['tags'] = Tag::all();
        return sendResponse($request->wantsJson(),null,$data,'Get Tags.',200);
    }
    /**
     * All Countries
     */
    public function getCountries(Request $request)
    {
        $data['countries'] = Country::all();
        return sendResponse($request->wantsJson(),null,$data,'Get Countries.',200);
    }
//    /**
//     * All States
//     */
//    public function getStates(Request $request)
//    {
//        $data['states'] = State::all();
//        return sendResponse($request->wantsJson(),null,$data,'Get States.',200);
//    }
//    /**
//     * All Cities
//     */
//    public function getCities(Request $request)
//    {
//        $data['cities'] = City::all();
//        return sendResponse($request->wantsJson(),null,$data,'Get Cities.',200);
//    }
    /**
     * getSearchFilter
     */
    public function getSearchFilter(Request $request)
    {
        $data['categories']   = Category::all();
        $data['countries'] = Country::all();
        if ($request->wantsJson()){
            return sendResponse($request->wantsJson(),null,null,'Get Search Filters.',200);
        }else {
            return view('pages.advance_search', compact('data'));
        }
    }
    /**
     * get Cities for search filters
     */
    public function getCitiesSearchFilters(Request $request,$id)
    {
        $data['cities'] = City::where('country_id',$id)->get();
        if($request->wantsJson()){
            return sendResponse($request->wantsJson(),null,$data,'Get Cities.',200);
        }else{
            return response()->json([
                'data' => $data,
            ]);
        }
    }

    public function _header()
    {
        return 'hello i am here';
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Aws\Exception\AwsException;
use Aws\Sns\SnsClient;

class DefaultController extends Controller
{
    /**
     * All Categories
     */
//    public function getCategories(Request $request)
//    {
//        $data['categories'] = Category::all();
//        return sendResponse($request->wantsJson(),null,$data,'Get Categories.',200);
//    }
//    /**
//     * All Features Tags
//     */
//    public function getFeatureTags(Request $request)
//    {
//        $data['tags'] = Tag::all();
//        return sendResponse($request->wantsJson(),null,$data,'Get Tags.',200);
//    }
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

    /**
     * @return string
     */
    public function _header()
    {
        return view('wordpress_template_files._header')->render();
    }

    /**
     * @return string
     */
    public function _footer()
    {
        return view('wordpress_template_files._footer')->render();
    }


    /**
     * @return string
     */
    public function _style()
    {
        return view('wordpress_template_files._head')->render();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function smsSend(Request $request)
    {
        $SnSclient = new SnsClient([
            'credentials' => [
                'key'    => 'AKIA34RGWFTKOURJGURV',
                'secret' => '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',
            ],
            'region' => 'us-east-2',
            'version' => '2010-03-31'
        ]);
//        $SnSclient = new SnsClient([
//            'profile' => 'default',
//            'region' => 'us-east-1',
//            'version' => '2010-03-31'
//        ]);

        $message = 'This message is sent from a Amazon SNS code sample.';
        $phone = $request->phone_no;

        try {
            $result = $SnSclient->publish([
                'Message' => $message,
                'PhoneNumber' => $phone,
            ]);
            dd($result);
        } catch (AwsException $e) {
            // output error message if fails
            dd($e->getMessage());
        }

//        try {
//            $result = $SnSclient->listPhoneNumbersOptedOut();
//            dd($result);
//        } catch (AwsException $e) {
//            // output error message if fails
//            error_log($e->getMessage());
//        }
    }
}

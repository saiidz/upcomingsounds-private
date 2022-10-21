<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\User;
use App\Models\Option;
use App\Models\Auction;
use App\Models\Country;
use App\Models\Vehicle;
use App\Models\Category;
use App\Http\Resources\Bid;
use Illuminate\Http\Request;
use App\Http\Resources\myBids;
use App\Models\AuctionVehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUpcomingMailable;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Http\Resources\SearchVehicleResource;
use App\Http\Resources\Auction as AuctionResource;
use App\Http\Resources\Vehicle as VehicleResource;

class DashboardController extends Controller
{
    /**
     * Dashboard
     */
    public function index(Request $request)
    {
        return view('pages.dashboard');
    }
    /**
     * privacyPolicy
     */
    public function privacyPolicy(Request $request)
    {
        return view('privacy-policy');
    }
    /**
     * termOfService
     */
    public function termOfService(Request $request)
    {
        return view('term-of-service');
    }
    /**
     * aboutUs
     */
    public function aboutUs(Request $request)
    {
        $theme = Option::where('key', 'about_settings')->first();
        if(!empty($theme))
        {
            $theme = json_decode($theme->value);
        }
        return view('about-us', get_defined_vars());
    }
    /**
     * contactUs
     */
    public function contactUs(Request $request)
    {
        return view('contact-us');
    }
    /**
     * contactUsPost
     */
    public function contactUsPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact_details = [
            'message' => $request->get('message'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
        ];

        Mail::to($request->get('email'))->send(new ContactUpcomingMailable($contact_details));

        return redirect('/contact-us')->with('success', 'Mail sent successfully.');
    }
    /**
     * blog
     */
    public function blog(Request $request)
    {
        return view('blog.blog');
    }

    /**
     * help
     */
    public function help()
    {
        return view('help');
    }
}

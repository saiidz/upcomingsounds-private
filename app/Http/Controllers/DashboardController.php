<?php

namespace App\Http\Controllers;
use App\Http\Resources\Auction as AuctionResource;
use App\Http\Resources\Bid;
use App\Http\Resources\myBids;
use App\Http\Resources\SearchVehicleResource;
use App\Http\Resources\Vehicle as VehicleResource;
use App\Models\Auction;
use App\Models\AuctionVehicle;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

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
}

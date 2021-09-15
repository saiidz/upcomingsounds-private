<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auction as AuctionResource;
use App\Models\Auction;
use App\Models\AuctionVehicle;
use App\Models\Bid;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function index(){

        return view('admin.pages.dashboard');
    }
}

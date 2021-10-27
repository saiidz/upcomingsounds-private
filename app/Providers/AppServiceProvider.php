<?php

namespace App\Providers;

use App\Models\Auction;
use App\Models\AuctionVehicle;
use App\Models\Bid;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Artisan::call('cache:clear');
//        Artisan::call('config:clear');
//        Artisan::call('route:clear');
//        Artisan::call('view:clear');
        Paginator::useBootstrap();
    }
}

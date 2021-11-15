<?php

namespace App\Providers;

use App\Models\ArtistTrack;
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
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $artist_track_count = ArtistTrack::where('user_id',Auth::id())->count();
                View::share('artist_track_count', $artist_track_count);
            }
        });
//        if (Auth::check()) {
//            View::share('artist_track_count', ArtistTrack::where('user_id',Auth::id())->count());
//        }
//        Artisan::call('cache:clear');
//        Artisan::call('config:clear');
//        Artisan::call('route:clear');
//        Artisan::call('view:clear');
        Paginator::useBootstrap();
    }
}

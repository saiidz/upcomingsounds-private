<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Option;
use App\Models\ArtistTrack;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Artisan;
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

        // Using closure based composers...
        View::composer('*', function ($view) {
            if (Auth::check())
            {
                if(Auth::user()->type == 'curator')
                {
                    $user_curator = Auth::user();
                    View::share('user_curator', $user_curator);
                }
            }
        });

        // theme setting composer
        View::composer('*', function ($view) {
            $theme = Option::where('key', 'theme_settings')->first();
            if(!empty($theme))
            {
                $theme = json_decode($theme->value);
                View::share('theme', $theme);
            }
        });

//        Artisan::call('cache:clear');
//        Artisan::call('config:clear');
//        Artisan::call('route:clear');
//        Artisan::call('view:clear');
        Paginator::useBootstrap();
    }
}

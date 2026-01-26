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
        Paginator::useBootstrap();

        // Unified View Composer for all views
        View::composer('*', function ($view) {
            // 1. Handle User Data (Artist/Curator)
            if (Auth::check()) {
                $user = Auth::user();
                
                // Share with all names used in your various layouts
                View::share('user_artist', $user);
                
                if($user->type == 'curator') {
                    View::share('user_curator', $user);
                }

                // Track count for artists
                $artist_track_count = ArtistTrack::where('user_id', $user->id)->count();
                View::share('artist_track_count', $artist_track_count);
            }

            // 2. Handle Theme Data (This prevents the 500 Layout crash)
            // We check for 'theme_settings' first, then 'home_new_settings' as backup
            $theme_option = Option::where('key', 'theme_settings')->first();
            if (!$theme_option) {
                $theme_option = Option::where('key', 'home_new_settings')->first();
            }

            if ($theme_option) {
                $theme = json_decode($theme_option->value);
                View::share('theme', $theme);
            } else {
                // Fail-safe object so !empty($theme->logo) doesn't crash
                View::share('theme', (object)['logo' => 'images/logo.png']);
            }
        });
    }
}

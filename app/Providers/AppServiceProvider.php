<?php

namespace App\Providers;

use App\Models\Option;
use App\Models\ArtistTrack;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();

        // Use the composer to safely inject variables into all views
        View::composer('*', function ($view) {
            
            // 1. Handle User Data (Artist/Curator)
            if (Auth::check()) {
                $user = Auth::user();
                
                // Pass all variations of the user object to prevent sidebar crashes
                $view->with([
                    'user_artist'        => $user,
                    'user_curator'       => ($user->type == 'curator') ? $user : null,
                    'artist_track_count' => ArtistTrack::where('user_id', $user->id)->count(),
                    'user'               => $user,
                    'artist'             => $user
                ]);
            }

            // 2. Handle Theme Data (Bulletproof Fallback)
            $theme_option = Option::whereIn('key', ['theme_settings', 'home_new_settings'])->first();

            if ($theme_option) {
                $themeData = json_decode($theme_option->value);
                $view->with('theme', $themeData);
            } else {
                // Return a safe object so your blade files don't crash on $theme->property
                $view->with('theme', (object)[
                    'logo' => 'images/logo.png',
                    'footer_text' => 'Upcoming Sounds'
                ]);
            }
        });
    }
}

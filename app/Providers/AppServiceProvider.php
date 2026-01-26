<?php

namespace App\Providers;

use App\Models\Option;
use App\Models\ArtistTrack;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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

        // 1. Prevent crashes during migrations or if the DB is missing tables
        if (!Schema::hasTable('options')) {
            return;
        }

        View::composer('*', function ($view) {
            try {
                // 2. Handle User Data (Artist/Curator)
                if (Auth::check()) {
                    $user = Auth::user();
                    
                    $view->with([
                        'user_artist'        => $user,
                        'user_curator'       => ($user->type == 'curator') ? $user : null,
                        'artist_track_count' => ArtistTrack::where('user_id', $user->id)->count(),
                        'user'               => $user,
                        'artist'             => $user
                    ]);
                }

                // 3. Handle Theme Data with Bulletproof Fallback
                $theme_option = Option::whereIn('key', ['theme_settings', 'home_new_settings'])->first();

                if ($theme_option && !empty($theme_option->value)) {
                    $themeData = json_decode($theme_option->value);
                    // Ensure it's an object so $theme->logo doesn't crash
                    $view->with('theme', is_object($themeData) ? $themeData : (object)['logo' => 'images/logo.png']);
                } else {
                    $view->with('theme', (object)['logo' => 'images/logo.png', 'footer_text' => 'Upcoming Sounds']);
                }

            } catch (\Exception $e) {
                // If everything fails, provide an empty theme object to keep the Layout alive
                $view->with('theme', (object)['logo' => 'images/logo.png']);
            }
        });
    }
}

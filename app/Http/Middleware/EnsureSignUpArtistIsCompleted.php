<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureSignUpArtistIsCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() ||
            ($request->user()->type == 'artist' &&
                ! $request->user()->artist_completed_signup)) {
            return $request->expectsJson()
                ? abort(403, 'Your Artist Signup is not Completed.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'artist.signup.notice'));
        }

        return $next($request);
    }
}

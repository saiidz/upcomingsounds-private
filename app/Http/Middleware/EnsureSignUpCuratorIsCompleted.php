<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureSignUpCuratorIsCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() ||
            ($request->user()->type == 'curator' &&
                ! $request->user()->curator_completed_signup)) {
            return $request->expectsJson()
                ? abort(403, 'Your Curator Signup is not Completed.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'curator.signup.notice'));
        }

        return $next($request);
    }
}

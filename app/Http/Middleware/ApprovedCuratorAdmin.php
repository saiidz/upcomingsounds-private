<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ApprovedCuratorAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty($request->user()) && ($request->user()->type == 'curator') && ($request->user()->is_approved == 0)){
            return  Redirect::guest(URL::route( 'curator.approval'));
        }
        return $next($request);
    }
}

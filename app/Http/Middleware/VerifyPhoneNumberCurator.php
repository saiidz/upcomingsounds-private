<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class VerifyPhoneNumberCurator
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
        if (!empty($request->user()) && (!$request->user()->phone_number) || ($request->user()->is_phone_verified == 0)){
            return  Redirect::guest(URL::route( 'curator.phone.number'));
        }
        return $next($request);
    }
}

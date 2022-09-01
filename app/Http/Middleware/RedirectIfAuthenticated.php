<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::guard($guard)->user()->type == 'artist'){
                    return redirect(RouteServiceProvider::HOME);
                }elseif(Auth::guard($guard)->user()->type == 'curator'){
                    return redirect(RouteServiceProvider::CURATOR);
                }elseif(Auth::guard($guard)->user()->type == 'admin' && Auth::guard($guard)->user()->is_blog == 0){
                    return redirect()->route('admin.dashboard');
                }elseif(Auth::guard($guard)->user()->is_blog == 1){
                    return redirect('/blog_admin');
                }
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}

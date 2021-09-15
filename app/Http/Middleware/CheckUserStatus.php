<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
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
        if(Auth::user()->status == "block") {
            if ($request->wantsJson()){
                $request->user()->token()->revoke();
                return sendResponse($request->wantsJson(),null, null, 'Your account has been blocked permanently.',200);
            }else {
                Auth::logout();
                session()->flash('failed', "Your account has been blocked.");
                return redirect()->route('login');
            }
        } elseif(Auth::user()->status == "suspend") {
            $suspension_days = Config::where('key', 'suspension_days')->first();
            if ($request->wantsJson()){
                $request->user()->token()->revoke();
                return sendResponse($request->wantsJson(),null, null, "Your account has been suspended for {$suspension_days->value } days.",200);
            }else {
                Auth::logout();
                session()->flash('failed', "Your account has been suspended for {$suspension_days->value } days.");
                return redirect()->route('login');
            }
        } else {
            return $next($request);
        }
        return $next($request);

    }
}

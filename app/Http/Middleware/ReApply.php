<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class ReApply
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // find user rejected
        if (!empty($request->user()) && ($request->user()->type == 'artist') && ($request->user()->is_approved == 0) && ($request->user()->is_rejected == 1)){
            $days = Carbon::parse($request->user()->updated_at)->addDays(45);
            // dd('2022-08-19 08:09:28.0' == '2022-08-19 08:09:28.0');
            // if('2022-08-19 08:09:28.0' == '2022-08-19 08:09:28.0')
            if(Carbon::today() >= $days)
            {
               // update user created at
                // User::where('id',$request->user()->id)->update([
                //     'created_at' => $days,
                // ]);
                return Redirect::guest(URL::route('re.apply'));
            }else{
                return Redirect::guest(URL::route('artist.rejected'));
            }
        }
        return $next($request);
    }
}

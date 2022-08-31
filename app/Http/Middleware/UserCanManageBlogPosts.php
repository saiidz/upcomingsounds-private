<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCanManageBlogPosts
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
        // if (!Auth::check()) {
        //     return redirect()->back()->with('error', 'Please loggin first, then you can add comments');
        // }
        // dd(Auth::user()->canManageBinshopsBlogPosts());
        if(Auth::check())
        {
            if (!empty(Auth::user()->canManageBinshopsBlogPosts())) {
                return redirect()->back()->with('error', 'You are admin,you cannot add comments');
            }
        }

        // if (!Auth::check()) {
        //     abort(401,"User not authorised to manage blog posts: You are not logged in");
        //     return redirect('/login');
        // }
        // if (!Auth::user()->canManageBinshopsBlogPosts()) {
        //     abort(401,"User not authorised to manage blog posts: Your account is not authorised to edit blog posts");
        // }
        return $next($request);
    }
}

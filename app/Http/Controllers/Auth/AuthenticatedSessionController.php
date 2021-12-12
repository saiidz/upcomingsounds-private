<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Config;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user_type = User::where('email', $request->email)->first();

        if(isset($user_type)){
            if($request->has('user_check') && ($user_type->type != 'artist')){
//                return redirect()->back()->with('error',"Please Sign in from tastemaker side.");
                return redirect()->route('curator.login')->with('error',"Please Sign in from tastemaker side.");
            }
        }

        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->type == 'admin'){
            return redirect()->route('admin.dashboard');
        }else{
            if(Auth::user()->status == 'block') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                session()->flash('failed', "Your account has been blocked permanently.");
                return redirect()->back();
            } elseif (Auth::user()->status == "suspend") {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $suspension_days = Config::where('key', 'suspension_days')->first();
                session()->flash('failed', "Your account has been for suspended for {$suspension_days->value } days.");
                return redirect()->back();

            } else {
                return redirect(RouteServiceProvider::HOME);
            }
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Destroy an destroyCurator authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyCurator(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/taste-maker-login');
    }

    /**
     * Display the login view.
     */
    public function createAdmin()
    {
        return view('admin.pages.admin-login');
    }


    /**
     * Display the create Curator login view.
     *
     * @return \Illuminate\View\View
     */
    public function createCurator()
    {
        return view('auth.curator-login');
    }

    /**
     * Handle an incoming authentication storeCurator request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeCurator(LoginRequest $request)
    {
        $user_type = User::where('email', $request->email)->first();

        if(isset($user_type)){
            if($request->has('user_check') && ($user_type->type != 'curator')){
//                return redirect()->back()->with('error',"Please Sign in from artist side.");
                return redirect()->route('login')->with('error',"Please Sign in from artist side.");
            }
        }

        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->type == 'admin'){
            return redirect()->route('admin.dashboard');
        }else{
            if(Auth::user()->status == 'block') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                session()->flash('failed', "Your account has been blocked permanently.");
                return redirect()->back();
            } elseif (Auth::user()->status == "suspend") {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $suspension_days = Config::where('key', 'suspension_days')->first();
                session()->flash('failed', "Your account has been for suspended for {$suspension_days->value } days.");
                return redirect()->back();

            } else {
                return redirect(RouteServiceProvider::CURATOR);
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Config;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Templates\IUserType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticatedSessionController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('auth.login-new');
//        return view('auth.login');
    }


    /**
     * @param LoginRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(LoginRequest $request)
    {
        $user_type = User::where('email', $request->email)->first();

        if(isset($user_type)){
            if($request->has('user_check') && ($user_type->type != 'artist')){
//                return redirect()->back()->with('error',"Please Sign in from tastemaker side.");
                return redirect()->route('curator.login')->with('error',"You are singing in as curator.");
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
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function destroyCurator(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/taste-maker-login');
    }

    /**
     * Display the admin login view.
     */
    public function createAdmin()
    {
        return view('admin.pages.admin-login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user_type = User::where('email', $request->email)->first();

        if(isset($user_type))
        {
            if($request->has('user_check') && ($user_type->type != 'artist'))
                return redirect()->route('curator.login')->with('error',"You are singing in as curator.");
        }

        // Authenticate using the default Laravel authentication
        if (!auth()->attempt($request->only('email', 'password')))
        {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

     /**
     * Display the blog login view.
     */
    public function createBlog()
    {
        return view('admin.pages.blog-login');
    }


    /**
     * Display the create Curator login view.
     *
     * @return \Illuminate\View\View
     */
    public function createCurator()
    {
        return view('auth.curator-login-new');
//        return view('auth.curator-login');
    }

    /**
     * @param LoginRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function storeCurator(LoginRequest $request)
    {
        $user_type = User::where('email', $request->email)->first();

        if(isset($user_type)){
            if($request->has('user_check') && ($user_type->type != 'curator')){
//                return redirect()->back()->with('error',"Please Sign in from artist side.");
                return redirect()->route('login')->with('error',"You are singing in as artist.");
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

    /**
     * @param LoginRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function blogStore(LoginRequest $request)
    {
        $user_type = User::where('email', $request->email)->first();

        if(isset($user_type)){
            if(($user_type->type == 'artist') || ($user_type->type == 'curator')){
                return redirect()->back()->with('error',"Please add correct credentials.");
            }
        }

        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->type == IUserType::BLOG){
            return redirect('/blog_admin');
        }else{
            return redirect('/login');
        }

//        if(Auth::user()->type == 'admin' && Auth::user()->is_blog != 1){
//            return redirect()->route('admin.dashboard');
//        }else{
//            return redirect('/blog_admin');
//        }
    }
}

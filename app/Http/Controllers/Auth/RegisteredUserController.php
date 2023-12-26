<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('auth.register-new');
//        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|alpha_dash|max:255|unique:users',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'type'     => 'artist',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the curators registration view.
     */
    public function createCurator()
    {
        return view('auth.curator-register-new');
//        return view('auth.curator-register');
    }

    /**
     * Handle an incoming registration curators request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeCurator(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address'  => 'required|string|max:255',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'address'  => $request->address,
            'type'     => 'curator',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::CURATOR);
    }
}

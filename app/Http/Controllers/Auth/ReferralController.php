<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\UserReferred;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\ReferralLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class ReferralController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function referral(Request $request)
    {
        try {
            $url     = request()->url();
//            $get_ref = explode('choose-signup/',$url);
            $get_ref = explode('ref/',$url);
            $new_ref  = explode('/',$get_ref[1]);
//            dd($new_ref[1]);
            $ref     = !empty($new_ref[1]) ? $new_ref[1] : '';
//            $ref     = !empty($get_ref[1]) ? $get_ref[1] : '';
            return view('auth.register-referral', get_defined_vars());
        } catch (\Throwable $th) {
            return redirect()->back();
        }

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
//            'name'     => 'required|string|max:255',
            'name'     => 'required|alpha_dash|max:255|unique:users',
//            'name'     => ($request->type == 'artist') ? 'required|alpha_dash|max:255|unique:users' : 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'type'     => 'artist',
//            'type'     => ($request->type == 'artist') ? 'artist' : 'curator',
        ]);

        event(new Registered($user));
        // find referral link
        if(!empty($request->ref))
        {
            $referral_link = ReferralLink::where('code',$request->ref)->first();
            if(isset($referral_link))
            {
                event(new UserReferred($referral_link->id, $user));
            }
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);

//        if($request->type == 'artist')
//        {
//            return redirect(RouteServiceProvider::HOME);
//        }else{
//            return redirect(RouteServiceProvider::CURATOR);
//        }


    }
}

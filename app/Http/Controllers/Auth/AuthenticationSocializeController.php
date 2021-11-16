<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class AuthenticationSocializeController extends Controller
{
    /**
     * Redirect the user to the Twitter authentication page.
     *
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
            $user =  $this->findOrCreateUser($user, $provider);
            Auth::login($user, true);
            return redirect(RouteServiceProvider::HOME);
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

    }
    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('register')
            ->with(['error' => $msg ?: 'Unable to login, try with another provider to login.']);
    }
    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @return User|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function findOrCreateUser($providerUser, $provider)
    {
        $user = User::where('provider_id', $providerUser->id)->first();
        if ($user) {
            $user->update([
                'name'              => $providerUser->name,
                'email'             => $providerUser->email,
                'email_verified_at' => Carbon::now(),
                'profile'           => $providerUser->avatar,
                'provider'          => $provider,
                'provider_id'       => $providerUser->id,
                'access_token'      => $providerUser->token
            ]);
        }else{
            $user = User::create([
                'name'              => $providerUser->getName(),
                'email'             => $providerUser->getEmail(),
                'email_verified_at' => Carbon::now(),
                'profile'           => $providerUser->getAvatar(),
                'provider'          => $provider,
                'provider_id'       => $providerUser->getId(),
                'access_token'      => $providerUser->token,
            ]);
        }
        return $user;
    }

    /**
     * createSocializePassword
     */
    public function createSocializePassword(Request $request)
    {
        $user = $request->user();
        return !$request->user()->password && $request->user()->provider
            ? view('pages.artists.artist-password.artist-create-password',compact('user','request'))
            : redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Show the manage create password view.
     */
    public function storeSocializePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|max:255|unique:users,email,'. auth()->user()->id,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = $request->user();

        User::find($user->id)->update([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        return redirect('/artist-signup-step-1')->with('success', 'Password Created successfully.');

    }
}


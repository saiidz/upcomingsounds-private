<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            return redirect('/artist-profile');
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
}


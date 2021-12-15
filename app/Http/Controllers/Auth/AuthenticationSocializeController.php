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
    public function redirectToProvider($provider, Request $request)
    {
        // session(['request_from' => $request->get('request_from')]);
//        return Socialite::driver($provider)->setScopes(['openid', 'email'])->redirect();
        if($provider == 'google'){
            session(['request_from' => $request->get('request_from')]);
            return Socialite::driver($provider)->setScopes(['openid', 'email'])->redirect();
        }else{
            session(['request_from' => $request->get('request_from')]);
            return Socialite::driver($provider)->redirect();
        }
    }

    /**
     * Obtain the user information from Twitter.
     *
     */
    public function handleProviderCallback($provider)
    {
        try {
            $request_from = session('request_from');
            if($provider == 'google'){
                $user = Socialite::driver('google')->stateless()->user();

                // check email already exists on both side curator and artist
                $user_email_exist = User::where('email',$user->getEmail())->where('type','!=',$request_from)->first();

                if(isset($user_email_exist)){
                    return redirect('/')->with('error','Email is already exists, try with another provider to login');
                }
            }elseif($provider == 'facebook'){

                $user = Socialite::driver('facebook')->user();

                // check email already exists on both side curator and artist
                $user_email_exist = User::where('email',$user->getEmail())->where('type','!=',$request_from)->first();

                if(isset($user_email_exist)){
                    return redirect('/')->with('error','Email is already exists, try with another provider to login');
                }

            }elseif($provider == 'spotify'){

                $user = Socialite::driver('spotify')->user();

                if(!empty($user->getEmail())){
                    $user_email_exist = User::where('email','=',$user->getEmail())->first();
                    if(isset($user_email_exist)){
                        return redirect('/')->with('error','Email is already exists, try with another provider to login');
                    }
                }

            }elseif($provider == 'twitter'){

                $user = Socialite::driver('twitter')->user();

                if(!empty($user->getEmail())){
                    $user_email_exist = User::where('email','=',$user->getEmail())->first();
                    if(isset($user_email_exist)){
                        return redirect('/')->with('error','Email is already exists, try with another provider to login');
                    }
                }

            }else{
                $user = Socialite::driver($provider)->user();
            }

            $user =  $this->findOrCreateUser($user, $provider,$request_from);
            Auth::login($user, true);
            if($request_from == 'artist'){
                return redirect(RouteServiceProvider::HOME);
            }elseif($request_from == 'curator'){
                return redirect(RouteServiceProvider::CURATOR);
            }
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

    }
    protected function sendFailedResponse($msg = null)
    {
        return redirect('/')
//            ->with('error', 'Unable to login and Email is already exists, try with another provider to login.');
            ->with(['error' => $msg ?: 'Unable to login, try with another provider to login.']);
    }
    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @return User|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function findOrCreateUser($providerUser, $provider, $request_from)
    {
        if($request_from == 'artist'){
            $user = User::where('provider_id', $providerUser->id)->where('type',$request_from)->first();
            if ($user) {
                $user->update([
                    'name'              => !empty($user->name) ? $user->name : $providerUser->name,
                    'email'             => !empty($user->email) ? $user->email : $providerUser->email,
                    'email_verified_at' => Carbon::now(),
                    'profile'           => !empty($user->profile) ? $user->profile : $providerUser->avatar,
                    'type'              => 'artist',
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
                    'type'              => 'artist',
                    'provider'          => $provider,
                    'provider_id'       => $providerUser->getId(),
                    'access_token'      => $providerUser->token,
                ]);
            }
        }elseif ($request_from == 'curator'){
            $user = User::where('provider_id', $providerUser->id)->where('type',$request_from)->first();
            if ($user) {
                $user->update([
                    'name'              => !empty($user->name) ? $user->name : $providerUser->name,
                    'email'             => !empty($user->email) ? $user->email : $providerUser->email,
                    'email_verified_at' => !empty($user->email) ? Carbon::now() : null,
                    'profile'           => !empty($user->profile) ? $user->profile : $providerUser->avatar,
                    'type'              => 'curator',
                    'provider'          => $provider,
                    'provider_id'       => $providerUser->id,
                    'access_token'      => $providerUser->token
                ]);
            }else{
                $user = User::create([
                    'name'              => $providerUser->getName(),
                    'email'             => $providerUser->getEmail(),
                    'email_verified_at' => (!empty($providerUser->getEmail())) ? Carbon::now() : null,
                    'profile'           => $providerUser->getAvatar(),
                    'type'              => 'curator',
                    'provider'          => $provider,
                    'provider_id'       => $providerUser->getId(),
                    'access_token'      => $providerUser->token,
                ]);
            }
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
            'name'     => 'required',
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
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        return redirect('/artist-signup-step-1')->with('success', 'Password Created successfully.');

    }


    /**
     * createCuratorSocializePassword
     */
    public function createCuratorSocializePassword(Request $request)
    {
        $user = $request->user();
        return !$request->user()->password && $request->user()->provider
            ? view('pages.curators.curator-password.curator-create-password',compact('user','request'))
            : redirect()->intended(RouteServiceProvider::CURATOR);
    }

    /**
     * Show the manage create curator password view.
     */
    public function storeCuratorSocializePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
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
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        $user =  User::find($user->id);
        if(!empty($user->email_verified_at)){
            return redirect('/taste-maker-phone-number')->with('success', 'Password Created successfully.');
        }
        return redirect('/verify-email')->with('success', 'Password Created successfully.');
    }
}


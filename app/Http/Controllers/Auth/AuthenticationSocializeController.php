<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class AuthenticationSocializeController extends Controller
{
    /**
     * Redirect the user to the Twitter authentication page.
     *
     */
    public function redirectToProvider($provider, Request $request)
    {
        try {
            // session(['request_from' => $request->get('request_from')]);
//        return Socialite::driver($provider)->setScopes(['openid', 'email'])->redirect();
            if($provider == 'google')
            {
                session(['request_from' => $request->get('request_from')]);
                return Socialite::driver($provider)->setScopes(['openid', 'email'])->redirect();
            }else{
                session(['request_from' => $request->get('request_from')]);
                return Socialite::driver($provider)->redirect();
            }
        }catch (Exception $e) {
            return redirect()->back();
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
            if($provider == 'google')
            {
                $user = Socialite::driver($provider)->stateless()->user();
                // check email already exists on both side curator and artist
//                $user_email_exist = User::where('email',$user->getEmail())->where('type','!=',$request_from)->first();
                $user_email_exist = User::where('email',$user->getEmail())->first();
                if(isset($user_email_exist))
                {
//                    if ($user_email_exist->type != $request_from)
//                    {
//                        if ($user_email_exist->type == 'curator')
//                        {
//                            return redirect('/taste-maker-login')->with('error','This email already exists. You are already Register this email from curator.');
//                        }elseif ($user_email_exist->type == 'artist')
//                        {
//                            return redirect('/login')->with('error','This email already exists. You are already Register this email from artist.');
//                        }
//                    }
//                    if ($user_email_exist->type == 'curator'){
//                        return redirect('/taste-maker-login')->with('error','This email already exists. Try signing in using another method or resetting your password.');
////                        return redirect('/taste-maker-login')->with('error','This email already exists. Try logging in again, forget your password, or Use another authentication method.');
//                    }elseif ($user_email_exist->type == 'artist'){
//                        return redirect('/login')->with('error','This email already exists. Try signing in using another method or resetting your password.');
////                        return redirect('/login')->with('error','This email already exists. Try logging in again, forget your password, or Use another authentication method.');
//                    }else{
//                        return redirect('/')->with('error','This email already exists. Try signing in using another method or resetting your password.');
//                    }
                }
            }elseif($provider == 'facebook'){

                $user = Socialite::driver('facebook')->user();

                // check email already exists on both side curator and artist
                $user_email_exist = User::where('email',$user->getEmail())->first();
                // $user_email_exist = User::where('email',$user->getEmail())->where('type','!=',$request_from)->first();

                if(isset($user_email_exist))
                {
                    if ($user_email_exist->type == 'curator'){
                        return redirect('/taste-maker-login')->with('error','Email is already exists, try with another provider to login');
                    }elseif ($user_email_exist->type == 'artist'){
                        return redirect('/login')->with('error','Email is already exists, try with another provider to login');
                    }else{
                        return redirect('/')->with('error','Email is already exists, try with another provider to login');
                    }
                }

            }elseif($provider == 'spotify'){

                $user = Socialite::driver('spotify')->user();

                if(!empty($user->getEmail())){
                    $user_email_exist = User::where('email','=',$user->getEmail())->first();
                    if ($user_email_exist->type == 'curator'){
                        return redirect('/taste-maker-login')->with('error','This email already exists. Try logging in again, forget your password, or Use another authentication method.');
                    }elseif ($user_email_exist->type == 'artist'){
                        return redirect('/login')->with('error','This email already exists. Try logging in again, forget your password, or Use another authentication method.');
                    }else{
                        return redirect('/')->with('error','This email already exists. Try logging in again, forget your password, or Use another authentication method.');
                    }
                }

            }elseif($provider == 'twitter'){

                $user = Socialite::driver('twitter')->user();

                if(!empty($user->getEmail())){
                    $user_email_exist = User::where('email','=',$user->getEmail())->first();
                    if ($user_email_exist->type != $request_from){
                        if ($user_email_exist->type == 'curator'){
                            return redirect('/taste-maker-login')->with('error','This email already exists. You are already Register this email from curator.');
                        }elseif ($user_email_exist->type == 'artist'){
                            return redirect('/login')->with('error','This email already exists. You are already Register this email from artist.');
                        }
                    }
//                    if ($user_email_exist->type == 'curator'){
//                        return redirect('/taste-maker-login')->with('error','This email already exists. Try signing in using another method or resetting your password.');
//                    }elseif ($user_email_exist->type == 'artist'){
//                        return redirect('/login')->with('error','This email already exists. Try signing in using another method or resetting your password.');
//                    }else{
//                        return redirect('/')->with('error','This email already exists. Try signing in using another method or resetting your password.');
//                    }
                }

            }else{
                $user = Socialite::driver($provider)->user();
            }

            $user =  $this->findOrCreateUser($user, $provider,$request_from);
            Auth::login($user, true);

            if($user->type == 'artist')
                return redirect(RouteServiceProvider::HOME);
            elseif($user->type == 'curator')
                return redirect(RouteServiceProvider::CURATOR);

//            if($request_from == 'artist')
//                return redirect(RouteServiceProvider::HOME);
//            elseif($request_from == 'curator')
//                return redirect(RouteServiceProvider::CURATOR);

        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

    }

    /**
     * @param $msg
     * @return Application|RedirectResponse|Redirector
     */
    protected function sendFailedResponse($msg = null)
    {
        return redirect('/')
//            ->with('error', 'Unable to login and Email is already exists, try with another provider to login.');
            ->with(['error' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    /**
     * @param $providerUser
     * @param $provider
     * @param $request_from
     * @return User
     */
    public function findOrCreateUser($providerUser, $provider, $request_from)
    {

        $user = User::where('email',$providerUser->getEmail())->first();
//        $user = User::where('email',$providerUser->getEmail())->where('provider_id', $providerUser->id)->first();

        Log::info('user info facebook: '.$user);
        if (isset($user))
        {
            $user->update([
                'name'              => !empty($user->name) ? $user->name : $providerUser->name,
                'email'             => !empty($user->email) ? $user->email : $providerUser->email,
                'email_verified_at' => Carbon::now(),
                'profile'           => !empty($user->profile) ? $user->profile : $providerUser->avatar,
                'type'              => $user->type,
                'provider'          => $provider,
                'provider_id'       => $providerUser->id,
                'access_token'      => $providerUser->token
            ]);
            Log::info('update user info facebook: '.$user);
        }else{
            $user = User::create([
                'name'              => $providerUser->getName(),
                'email'             => $providerUser->getEmail(),
                'email_verified_at' => Carbon::now(),
                'profile'           => $providerUser->getAvatar(),
                'type'              => $request_from,
                'provider'          => $provider,
                'provider_id'       => $providerUser->getId(),
                'access_token'      => $providerUser->token,
            ]);
            Log::info('create user info facebook: '.$user);
        }

        return $user;
        #exit

//        dd($user_email_exist,$providerUser, $provider, $request_from);
        if($request_from == 'artist')
        {
//            $user = User::where('provider_id', $providerUser->id)->where('type',$request_from)->first();
            $user = User::where('email',$providerUser->getEmail())->where('provider_id', $providerUser->id)->first();
            Log::info('user info artist: '.$user);
            if (isset($user))
            {
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
                Log::info('update user info artist: '.$user);
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
                Log::info('create user info artist: '.$user);
            }
        }elseif ($request_from == 'curator')
        {
            $user = User::where('email',$providerUser->getEmail())->where('provider_id', $providerUser->id)->first();
//            $user = User::where('provider_id', $providerUser->id)->where('type',$request_from)->first();

            Log::info('user info curator: '.$user);
            if (isset($user))
            {
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
                Log::info('update user info curator: '.$user);
            }else{
                $user = User::create([
                    'name'              => $providerUser->getName() ?? null,
                    'email'             => $providerUser->getEmail() ?? null,
                    'email_verified_at' => (!empty($providerUser->getEmail())) ? Carbon::now() : null,
                    'profile'           => $providerUser->getAvatar() ?? null,
                    'type'              => 'curator',
                    'provider'          => $provider,
                    'provider_id'       => $providerUser->getId(),
                    'access_token'      => $providerUser->token,
                ]);
                Log::info('create user info curator: '.$user);
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


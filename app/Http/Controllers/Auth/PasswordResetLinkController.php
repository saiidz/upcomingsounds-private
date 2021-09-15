<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if ($request->wantsJson()) {

            $input = $request->only('email');

            $validator = Validator::make($input, [
                'email' => "required|email"
            ]);

            if ($validator->fails()) {
                return sendError($request->wantsJson(), null, $validator->messages(), 'The given data was invalid', 422);
            }

            // We will send the password reset link to this user. Once we have attempted
            // to send the link, we will examine the response then see the message we
            // need to show to the user. Finally, we'll send out a proper response.
            $status = Password::sendResetLink(
                $request->only('email')
            );
            if($status == Password::RESET_LINK_SENT){
                return response()->json([
                    'success' => "We have emailed your password reset link!",
                ]);

            }else{
                return response()->json([
                    'error' => "We can't find a user with that email address.",
                ]);
            }


        } else {
            $request->validate([
                'email' => 'required|email',
            ]);

            // We will send the password reset link to this user. Once we have attempted
            // to send the link, we will examine the response then see the message we
            // need to show to the user. Finally, we'll send out a proper response.
            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status == Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withInput($request->only('email'))
                    ->withErrors(['email' => __($status)]);
        }


    }

    /**
     * Display the password reset link request view.
     *
     */
    public function createAdminForgot()
    {
        return view('admin.pages.admin-forgot-password');
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createAdminForgotStore(Request $request)
    {
//        $request->validate([
//            'email' => 'required|email',
//        ]);
//        $email = $request->email;
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
//        $status = Password::sendResetLink(
//            $request->only('email')
//        );
//        $user = User::sendPasswordResetNotification();
//        return $user;
//        return $this->sendPasswordResetNotification($request->email);
//        $this->notify(new ResetPasswordNotification($request->_token,$email));
//        event(new ResetPasswordNotification($request->_token,$email));
//        return $status == Password::RESET_LINK_SENT
//            ? back()->with('status', __($status))
//            : back()->withInput($request->only('email'))
//                ->withErrors(['email' => __($status)]);
    }
}

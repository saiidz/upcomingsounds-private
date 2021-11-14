<?php

use App\Http\Controllers\Auth\ArtistSignupController;
use App\Http\Controllers\Auth\ArtistSignupRepresentativeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\AuthenticationSocializeController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\MobileAuthenticatedController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

// Admin login
Route::get('/admin/login', [AuthenticatedSessionController::class, 'createAdmin'])
                ->middleware('guest')
                ->name('admin.login');
Route::get('/admin', function(){
   return redirect()->route("admin.login");
});
// Admin login

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

// admin-forgot-password
Route::get('/admin/forgot-password', [PasswordResetLinkController::class, 'createAdminForgot'])
                ->middleware('guest')
                ->name('admin.password.request');

Route::post('/admin/forgot-password', [PasswordResetLinkController::class, 'createAdminForgotStore'])
                ->middleware('guest')
                ->name('admin.password.email');
// admin-forgot-password

// admin-reset-password
Route::get('/admin/reset-password/{token}', [NewPasswordController::class, 'createAdminPasswordReset'])
                ->middleware('guest')
                ->name('admin.password.reset');
// admin-reset-password

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::any('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

// Socialize Authenticated Controller
Route::get('login/{provider}', [AuthenticationSocializeController::class, 'redirectToProvider']);
Route::get('auth/callback/{provider}', [AuthenticationSocializeController::class, 'handleProviderCallback']);





/***************************************************** Artist Routes *********************************************************/

// Artist Signup
Route::get('/artist-signup-step-1', [ArtistSignupController::class, '__invoke'])
    ->middleware('auth')
    ->name('artist.signup.notice');

Route::get('/artist-signup-step-2', [ArtistSignupController::class, 'artistSignupStep2'])
    ->middleware('auth')
    ->name('artist.signup.step.2');
Route::post('/artist-signup-step-2', [ArtistSignupController::class, 'postArtistSignupStep2'])
    ->middleware('auth')
    ->name('artist.signup.step.2.post');

Route::get('/artist-signup-step-3', [ArtistSignupController::class, 'artistSignupStep3'])
    ->middleware('auth')
    ->name('artist.signup.step.3');
Route::post('/artist-signup-step-3', [ArtistSignupController::class, 'postArtistSignupStep3'])
    ->middleware('auth')
    ->name('artist.signup.step.3.post');

Route::get('/artist-signup-step-4', [ArtistSignupController::class, 'artistSignupStep4'])
    ->middleware('auth')
    ->name('artist.signup.step.4');
Route::post('/artist-signup-step-4', [ArtistSignupController::class, 'postArtistSignupStep4'])
    ->middleware('auth')
    ->name('artist.signup.step.4.post');

Route::get('/artist-signup-step-5', [ArtistSignupController::class, 'artistSignupStep5'])
    ->middleware('auth')
    ->name('artist.signup.step.5');
Route::post('/artist-signup-step-5', [ArtistSignupController::class, 'postArtistSignupStep5'])
    ->middleware('auth')
    ->name('artist.signup.step.5.post');

Route::get('/artist-signup-step-6', [ArtistSignupController::class, 'artistSignupStep6'])
    ->middleware('auth')
    ->name('artist.signup.step.6');
Route::post('/artist-signup-step-6', [ArtistSignupController::class, 'postArtistSignupStep6'])
    ->middleware('auth')
    ->name('artist.signup.step.6.post');

Route::get('/artist-signup-step-7', [ArtistSignupController::class, 'artistSignupStep7'])
    ->middleware('auth')
    ->name('artist.signup.step.7');
Route::post('/artist-signup-step-7', [ArtistSignupController::class, 'postArtistSignupStep7'])
    ->middleware('auth')
    ->name('artist.signup.step.7.post');
// Artist Signup


// Artist Signup Representative

Route::get('/artist-signup-step-1', [ArtistSignupRepresentativeController::class, '__invoke'])
    ->middleware('auth')
    ->name('artist.signup.notice');

Route::get('/artist-signup-representative-step-2', [ArtistSignupRepresentativeController::class, 'artistSignupRepresentativeStep2'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.2');
Route::post('/artist-signup-representative-step-2', [ArtistSignupRepresentativeController::class, 'postArtistSignupRepresentativeStep2'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.2.post');

Route::get('/artist-signup-representative-step-3', [ArtistSignupRepresentativeController::class, 'artistSignupRepresentativeStep3'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.3');
Route::post('/artist-signup-representative-step-3', [ArtistSignupRepresentativeController::class, 'postArtistSignupRepresentativeStep3'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.3.post');

Route::get('/artist-signup-representative-step-4', [ArtistSignupRepresentativeController::class, 'artistSignupRepresentativeStep4'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.4');
Route::post('/artist-signup-representative-step-4', [ArtistSignupRepresentativeController::class, 'postArtistSignupRepresentativeStep4'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.4.post');
//
Route::get('/artist-signup-representative-step-5', [ArtistSignupRepresentativeController::class, 'artistSignupRepresentativeStep5'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.5');
Route::post('/artist-signup-representative-step-5', [ArtistSignupRepresentativeController::class, 'postArtistSignupRepresentativeStep5'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.5.post');
//
Route::get('/artist-signup-representative-step-6', [ArtistSignupRepresentativeController::class, 'artistSignupRepresentativeStep6'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.6');
Route::post('/artist-signup-representative-step-6', [ArtistSignupRepresentativeController::class, 'postArtistSignupRepresentativeStep6'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.6.post');
//
Route::get('/artist-signup-representative-step-7', [ArtistSignupRepresentativeController::class, 'artistSignupRepresentativeStep7'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.7');
Route::post('/artist-signup-representative-step-7', [ArtistSignupRepresentativeController::class, 'postArtistSignupRepresentativeStep7'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.7.post');

Route::get('/artist-signup-representative-step-8', [ArtistSignupRepresentativeController::class, 'artistSignupRepresentativeStep8'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.8');
Route::post('/artist-signup-representative-step-8', [ArtistSignupRepresentativeController::class, 'postArtistSignupRepresentativeStep8'])
    ->middleware('auth')
    ->name('artist.signup.representative.step.8.post');
// Artist Signup Representative


/***************************************************** Artist Routes *********************************************************/

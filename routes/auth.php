<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ReferralController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ArtistSignupController;
use App\Http\Controllers\Auth\CuratorSignupController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\MobileAuthenticatedController;
use App\Http\Controllers\Auth\PhoneNumberVerifiedController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\CuratorDetailsSignupController;
use App\Http\Controllers\Auth\YoutubeCuratorSignupController;
use App\Http\Controllers\Auth\PlaylistCuratorSignupController;
use App\Http\Controllers\Auth\AuthenticationSocializeController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ArtistSignupRepresentativeController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

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

// Blog login
Route::get('/blog/login', [AuthenticatedSessionController::class, 'createBlog'])
                ->middleware('guest')
                ->name('blog.login');
Route::get('/blog', function(){
   return redirect()->route("blog.login");
});
Route::post('/blog-login', [AuthenticatedSessionController::class, 'blogStore'])
    ->middleware('guest')->name('blog.store');
// Blog login

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

Route::any('/curator-logout', [AuthenticatedSessionController::class, 'destroyCurator'])
    ->name('curator.logout');

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

// Artist Create Password
Route::get('/create-password', [AuthenticationSocializeController::class, 'createSocializePassword'])
    ->middleware('auth')
    ->name('artist.create.password');
Route::post('/create-password', [AuthenticationSocializeController::class, 'storeSocializePassword'])
    ->middleware('auth')
    ->name('artist.create.password.post');


// Artist Approval Admin Route
Route::get('/artist-approval', [ArtistSignupController::class, 'artistApprovalAdmin'])
    ->middleware('auth')
    ->name('artist.approval');

// Artist Approval Admin Route
Route::get('/artist-reject', [ArtistSignupController::class, 'artistRejectedAdmin'])
    ->middleware('auth')
    ->name('artist.rejected');
/***************************************************** Artist Routes *********************************************************/



// re-apply route
Route::get('/re-apply', [ArtistSignupController::class, 'reApply'])
    ->middleware('auth')
    ->name('re.apply');

Route::get('/re-apply/submission', [ArtistSignupController::class, 'reApplySubmission'])
    ->middleware('auth')
    ->name('re.apply.submission');

Route::post('/re-apply/{user}', [ArtistSignupController::class, 'storeReApply'])
    ->middleware('auth')
    ->name('re.apply.store');





/***************************************************** Curators Routes *********************************************************/
// Curators Signup and login route
Route::get('/taste-maker-register', [RegisteredUserController::class, 'createCurator'])
    ->middleware('guest')
    ->name('curator.register');

Route::post('/taste-maker-register', [RegisteredUserController::class, 'storeCurator'])
    ->middleware('guest');


Route::get('/taste-maker-login', [AuthenticatedSessionController::class, 'createCurator'])
    ->middleware('guest')
    ->name('curator.login');

Route::post('/taste-maker-login', [AuthenticatedSessionController::class, 'storeCurator'])
    ->middleware('guest');


// Curators Signup
Route::get('/taste-maker-signup-step-1', [CuratorSignupController::class, '__invoke'])
    ->middleware('auth')
    ->name('curator.signup.notice');

Route::get('/taste-maker-signup-step-2', [CuratorSignupController::class, 'curatorSignupStep2'])
    ->middleware('auth')
    ->name('curator.signup.step.2');
Route::post('/taste-maker-signup-step-2', [CuratorSignupController::class, 'postCuratorSignupStep2'])
    ->middleware('auth')
    ->name('curator.signup.step.2.post');

Route::get('/taste-maker-signup-step-3', [CuratorSignupController::class, 'curatorSignupStep3'])
    ->middleware('auth')
    ->name('curator.signup.step.3');


/***************************************************** Influencer Route *********************************************************/
// influencer Route
Route::post('/influencer-signup-step-3', [CuratorSignupController::class, 'postInfluencerSignupStep3'])
    ->middleware('auth')
    ->name('influencer.signup.step.3.post');

Route::get('/influencer-signup-step-4', [CuratorSignupController::class, 'influencerSignupStep4'])
    ->middleware('auth')
    ->name('influencer.signup.step.4');
Route::post('/influencer-signup-step-4', [CuratorSignupController::class, 'postInfluencerSignupStep4'])
    ->middleware('auth')
    ->name('influencer.signup.step.4.post');
/***************************************************** Influencer Route *********************************************************/

/***************************************************** Youtube Route *********************************************************/
// Youtube Route
Route::post('/youtube-signup-step-3', [YoutubeCuratorSignupController::class, 'postYoutubeSignupStep3'])
    ->middleware('auth')
    ->name('youtube.signup.step.3.post');

Route::get('/youtube-signup-step-4', [YoutubeCuratorSignupController::class, 'youtubeSignupStep4'])
    ->middleware('auth')
    ->name('youtube.signup.step.4');
Route::post('/youtube-signup-step-4', [YoutubeCuratorSignupController::class, 'postYoutubeSignupStep4'])
    ->middleware('auth')
    ->name('youtube.signup.step.4.post');
/***************************************************** Youtube Route *********************************************************/

/***************************************************** Playlist Route *********************************************************/
// Playlist Route
Route::post('/playlist-signup-step-3', [PlaylistCuratorSignupController::class, 'postPlaylistSignupStep3'])
    ->middleware('auth')
    ->name('playlist.signup.step.3.post');

Route::get('/playlist-signup-step-4', [PlaylistCuratorSignupController::class, 'playlistSignupStep4'])
    ->middleware('auth')
    ->name('playlist.signup.step.4');
Route::post('/playlist-signup-step-4', [PlaylistCuratorSignupController::class, 'postPlaylistSignupStep4'])
    ->middleware('auth')
    ->name('playlist.signup.step.4.post');
/***************************************************** Playlist Route *********************************************************/

/***************************************************** Radio Route *********************************************************/
// Radio Route

Route::post('/taste-maker-signup-step-4', [CuratorDetailsSignupController::class, 'postCuratorsSignupStep4'])
    ->middleware('auth')
    ->name('curators.signup.step.4.post');
/***************************************************** Radio Route *********************************************************/


Route::get('/taste-maker-signup-step-social-media', [CuratorSignupController::class, 'curatorSignupSocialMedia'])
    ->middleware('auth')
    ->name('curator.signup.step.social.media');

Route::post('/taste-maker-signup-step-social.media', [CuratorSignupController::class, 'postCuratorSignupSocialMedia'])
    ->middleware('auth')
    ->name('curator.signup.step.social.media.post');

Route::get('/taste-maker-signup-step-features', [CuratorSignupController::class, 'curatorSignupStepFeatures'])
    ->middleware('auth')
    ->name('curator.signup.step.features');
Route::post('/taste-maker-signup-step-features', [CuratorSignupController::class, 'postCuratorSignupStepFeatures'])
    ->middleware('auth')
    ->name('curator.signup.step.features.post');

Route::get('/taste-maker-signup-step-last', [CuratorSignupController::class, 'curatorSignupStepLast'])
    ->middleware('auth')
    ->name('curator.signup.step.last');
Route::post('/taste-maker-signup-step-last', [CuratorSignupController::class, 'postCuratorSignupStepLast'])
    ->middleware('auth')
    ->name('curator.signup.step.last.post');



// Curator Approval Admin Route
Route::get('/taste-maker-approval', [CuratorSignupController::class, 'curatorApprovalAdmin'])
    ->middleware('auth')
    ->name('curator.approval');

// Curator Approval Admin Route
Route::get('/taste-maker-reject', [CuratorSignupController::class, 'curatorRejectedAdmin'])
->middleware('auth')
->name('curator.rejected');

// Curator Create Password
Route::get('/taste-maker-create-password', [AuthenticationSocializeController::class, 'createCuratorSocializePassword'])
    ->middleware('auth')
    ->name('curator.create.password');
Route::post('/taste-maker-create-password', [AuthenticationSocializeController::class, 'storeCuratorSocializePassword'])
    ->middleware('auth')
    ->name('curator.create.password.post');


// Phone Verifying For Curators
Route::get('/taste-maker-phone-number', [PhoneNumberVerifiedController::class, 'curatorPhoneNumber'])
    ->middleware('auth')
    ->name('curator.phone.number');
Route::post('/taste-maker-phone-number', [PhoneNumberVerifiedController::class, 'storeCuratorPhoneNumber'])
    ->middleware('auth')
    ->name('curator.phone.number.post');

// Verify Otp For Curators
Route::get('/taste-maker-verify-otp', [PhoneNumberVerifiedController::class, 'curatorVerifyOtp'])
    ->middleware('auth')
    ->name('curator.verify.otp');
Route::post('/taste-maker-verify-otp', [PhoneNumberVerifiedController::class, 'postCuratorVerifyOtp'])
    ->middleware('auth')
    ->name('curator.verify.otp.post');

// Send Again Otp Code
Route::post('/send-again-otp-code', [PhoneNumberVerifiedController::class, 'verifySendAgainOtpCode'])
    ->middleware('auth');


// Instagram Profile Show
Route::get('/instagram-profile-show', [CuratorSignupController::class, 'instagramProfileShow'])
    ->middleware('auth');

// Tiktok Profile Show
Route::get('/tiktok-profile-show', [CuratorSignupController::class, 'tiktokProfileShow'])
    ->middleware('auth');

// Youtube Profile Show
Route::get('/youtube-profile-show', [CuratorSignupController::class, 'youtubeSubscriberShow'])
    ->middleware('auth');

/***************************************************** Curators Routes *********************************************************/

/***************************************************** Referral Routes *********************************************************/
Route::get('/ref/{ref}/{code}', [ReferralController::class, 'referral'])
//Route::get('/choose-signup/ref/{ref}/{code}', [ReferralController::class, 'referral'])
                ->middleware('guest');

Route::post('/referral/register', [ReferralController::class, 'store'])
                ->middleware('guest');
/***************************************************** Referral Routes *********************************************************/

```php
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Twilio\Rest\Client;

use App\Helpers\Helper;
use App\Models\Option;
use App\Models\HomeSlider;
use App\Models\Testimonial;

use App\Http\Controllers\MessengerController;
use App\Http\Controllers\Curator\SendOfferController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\BinshopsCommentWriterController;
use App\Http\Controllers\Auth\AuthenticationSocializeController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $theme_home = Option::where('key', 'home_new_settings')->first();
    $homeSliders = HomeSlider::where('status',1)->latest()->get();
    $testimonials = Testimonial::where('status',1)->latest()->get();

    if(!empty($theme_home)){
        $theme_home = json_decode($theme_home->value);
    }

    return view('welcome-new', get_defined_vars());
});

/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN (PUBLIC — MUST BE BEFORE auth.php + fallback)
|--------------------------------------------------------------------------
*/

Route::get('login/google', [AuthenticationSocializeController::class, 'redirectToProvider'])
    ->middleware('guest')
    ->name('login.google');

Route::get('auth/callback/google', [AuthenticationSocializeController::class, 'handleProviderCallback'])
    ->name('login.google.callback');

/*
|--------------------------------------------------------------------------
| Load auth routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Application routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['try_catch']], function() {

    /* ================= ADMIN ================= */
    Route::prefix('admin')->group(base_path('routes/admin.php'));

    /* ================= BLOG ================= */
    Route::group(['middleware' => ['web'], 'namespace' => '\BinshopsBlog\Controllers'], function () {

        Route::group(['prefix' => "/{locale}/".config('binshopsblog.blog_prefix', 'blog')], function () {

            Route::group(['middleware' => 'throttle:10,3'], function () {
                Route::post('save_comment/{blogPostSlug}',
                    [BinshopsCommentWriterController::class,'addNewComment']
                )->name('binshopsblog.comments.add_new_comment');
            });

        });
    });

    /* ================= ARTIST AUTH ================= */
    Route::group(['middleware' => ['auth','verify_if_user','create_password','verified','artist_signup','approved_artist_admin','re_apply','rejected_artist_admin']], function() {
        Route::prefix('')->group(base_path('routes/client/auth.php'));
    });

    /* ================= CURATOR AUTH ================= */
    Route::group(['middleware' => ['auth','verify_if_curator','create_curator_password','verified','verified_phone_number_curator','curator_signup','approved_curator_admin','re_apply','rejected_curator_admin']], function() {
        Route::prefix('')->group(base_path('routes/client/curator_auth.php'));
    });

    /* ================= MESSENGER ================= */
    Route::group(['middleware' => ['auth']], function () {
        Route::get('get-chat', [MessengerController::class,'getChat'])->name('get.chat');
        Route::get('get-customer-chat', [MessengerController::class,'getCustomerChat'])->name('get.customer.chat');
        Route::post('save-message', [MessengerController::class,'saveMessage'])->name('save.messsage');
    });

    /* ================= PUBLIC CLIENT ================= */
    Route::prefix('')->group(base_path('routes/client/no_auth.php'));
});

/*
|--------------------------------------------------------------------------
| Test event
|--------------------------------------------------------------------------
*/
Route::get('/t', function () {
    event(new \App\Events\RealTimeNotification());
    dd('Event Run Successfully.');
});

/*
|--------------------------------------------------------------------------
| Fallback MUST be last
|--------------------------------------------------------------------------
*/
Route::fallback([Helper::class, 'fallback']);
```

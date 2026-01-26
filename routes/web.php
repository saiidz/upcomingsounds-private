<?php

use App\Http\Controllers\Curator\SendOfferController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\Artist\OfferController; 
use App\Models\HomeSlider;
use App\Models\Option;
use App\Helpers\Helper;
use App\Models\Testimonial;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\BinshopsCommentWriterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $theme_home = Option::where('key', 'home_new_settings')->first();
    $homeSliders = HomeSlider::where('status',1)->latest()->get();
    $testimonials = Testimonial::latest()->where('status',1)->get();

    if(!empty($theme_home)) {
        $theme_home = json_decode($theme_home->value);
    }
    return view('welcome-new', get_defined_vars());
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['try_catch']], function() {

    /**************** Admin ****************/
    Route::prefix('admin')->group(base_path('routes/admin.php'));

    Route::group(['middleware' => ['web'], 'namespace' => '\BinshopsBlog\Controllers'], function () {
        Route::group(['prefix' => "/{locale}/".config('binshopsblog.blog_prefix', 'blog')], function () {
            Route::group(['middleware' => 'throttle:10,3'], function () {
                Route::post('save_comment/{blogPostSlug}', [BinshopsCommentWriterController::class,'addNewComment'])
                    ->name('binshopsblog.comments.add_new_comment');
            });
        });
    });

    /**************** Artist Routes (Unified Fix) ****************/
    Route::group(['middleware' => ['auth','verify_if_user','create_password','verified','artist_signup','approved_artist_admin','re_apply','rejected_artist_admin']], function() {
        
        // Loads legacy auth routes. Keep for compatibility.
        Route::prefix('')->group(base_path('routes/client/auth.php'));
        
        // DASHBOARD FIX: Unified route for the main offers list
        Route::get('/artist-offers', [OfferController::class, 'offers'])->name('artist.custom.index');
        
        // STATUS PAGES: Isolated to prevent 500 errors
        Route::get('/pending-offer-list', [OfferController::class, 'pending'])->name('artist.custom.pending');
        Route::get('/accepted-offer-list', [OfferController::class, 'accepted'])->name('artist.custom.accepted');
        Route::get('/completed-offer-list', [OfferController::class, 'completed'])->name('artist.custom.completed');
        Route::get('/rejected-offer-list', [OfferController::class, 'rejected'])->name('artist.custom.rejected');
        Route::get('/alternative-offer-list', [OfferController::class, 'alternative'])->name('artist.custom.alternative');

        // DETAILS FIX: Unique detail route ensures the "View Offer" button works
        Route::get('/view-offer-details/{send_offer}', [OfferController::class, 'offerShow'])->name('artist.custom.show');
    });

    /**************** Curator Routes ****************/
    Route::group(['middleware' => ['auth','verify_if_curator','create_curator_password','verified','verified_phone_number_curator','curator_signup','approved_curator_admin','re_apply','rejected_curator_admin']], function() {
        Route::prefix('')->group(base_path('routes/client/curator_auth.php'));
    });

    // Shared Actions
    Route::post('/submit-curator-rating', [OfferController::class, 'submitCuratorRating'])->name('artist.submit-rating');

    /**************** Shared Routes ****************/
    Route::group(['middleware' => ['auth']], function () {
        Route::get('get-chat', [MessengerController::class,'getChat'])->name('get.chat');
        Route::get('get-customer-chat', [MessengerController::class,'getCustomerChat'])->name('get.customer.chat');
        Route::post('save-message', [MessengerController::class,'saveMessage'])->name('save.messsage');
    });

    Route::prefix('')->group(base_path('routes/client/no_auth.php'));
});

Route::get('/t', function () {
    event(new \App\Events\RealTimeNotification());
    dd('Event Run Successfully.');
});

Route::any('{url?}/{sub_url?}', [Helper::class, 'fallback']);

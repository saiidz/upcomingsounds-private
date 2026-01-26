<?php

use App\Http\Controllers\Curator\SendOfferController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\Artist\OfferController; // Added correct import
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
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $theme_home = Option::where('key', 'home_new_settings')->first();
    $homeSliders = HomeSlider::where('status',1)->latest()->get();
    $testimonials = Testimonial::latest()->where('status',1)->get();

    if(!empty($theme_home))
    {
        $theme_home = json_decode($theme_home->value);
    }
    return view('welcome-new', get_defined_vars());
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['try_catch']], function() {

    /***************************************************** Admin *********************************************************/

    Route::prefix('admin')->group(base_path('routes/admin.php'));

    Route::group(['middleware' => ['web'], 'namespace' => '\BinshopsBlog\Controllers'], function () {

        /** The main public facing blog routes - show all posts, view a category, view a single post, also the add comment route */
        Route::group(['prefix' => "/{locale}/".config('binshopsblog.blog_prefix', 'blog')], function () {

            // throttle to a max of 10 attempts in 3 minutes:
            Route::group(['middleware' => 'throttle:10,3'], function () {

                Route::post('save_comment/{blogPostSlug}',
                [BinshopsCommentWriterController::class,'addNewComment'])
                    ->name('binshopsblog.comments.add_new_comment');

            });

        });
    });

    /***************************************************** Artist Routes *********************************************************/
    Route::group(['middleware' => ['auth','verify_if_user','create_password','verified','artist_signup','approved_artist_admin','re_apply','rejected_artist_admin']], function() {
        Route::prefix('')->group(base_path('routes/client/auth.php'));
    });
    
    // Fixed: Now uses the imported OfferController class
    Route::get('/rejected-details', [OfferController::class, 'rejected'])->name('artist.rejected_details');

    /***************************************************** Curators Routes *********************************************************/
    Route::group(['middleware' => ['auth','verify_if_curator','create_curator_password','verified','verified_phone_number_curator','curator_signup','approved_curator_admin','re_apply','rejected_curator_admin']], function() {
        Route::prefix('')->group(base_path('routes/client/curator_auth.php'));
    });

    // Fixed: Changed ArtistOfferController to OfferController to match your file system
    Route::post('/submit-curator-rating', [OfferController::class, 'submitCuratorRating'])->name('artist.submit-rating');

    /***************************************************** Shared Routes *********************************************************/
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

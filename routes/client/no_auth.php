<?php

use App\Http\Controllers\GiftCardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketHelpController;
use App\Http\Controllers\Curator\CuratorController;
use App\Http\Controllers\Auth\ArtistSignupController;
use BinshopsBlog\Controllers\BinshopsReaderController;
use App\Http\Controllers\NewsLetterSubscriptionController;
use App\Http\Controllers\Admin\BinshopsCommentWriterController;


/***************************************************** Artist Routes *********************************************************/

// Artist Routes
Route::get('artist-home', [ArtistSignupController::class,'index']);
Route::get('artists', [ArtistSignupController::class,'artists']);

// Artist Signup


/***************************************************** Artist Routes *********************************************************/
Route::get('for-artists', [ArtistController::class,'forArtists']);

/***************************************************** Curators Routes *********************************************************/

// Curators Routes
Route::get('curator-home', [CuratorController::class,'index']);
Route::get('for-curators', [CuratorController::class,'forCurators']);

// Curators Signup


/***************************************************** Curators Routes *********************************************************/


/***************************************************** Pages Routes *********************************************************/

// Pages Routes
Route::get('privacy-policy', [DashboardController::class,'privacyPolicy']);
Route::get('term-of-service', [DashboardController::class,'termOfService']);
Route::get('about-us', [DashboardController::class,'aboutUs']);
Route::get('contact-us', [DashboardController::class,'contactUs']);
Route::post('contact-us',[DashboardController::class,'contactUsPost']);
// Route::get('blog', [DashboardController::class,'blog']);
Route::get('how-to-help', [DashboardController::class,'help']);
Route::get('help/ticket', [TicketHelpController::class,'helpTicket']);
Route::post('help/ticket', [TicketHelpController::class,'postHelpTicket']);
Route::post('newsletter', [NewsLetterSubscriptionController::class,'newsLetter'])->name('newsLetter');

# public profile artist
Route::get('artist/public/{user:name}',[ArtistController::class,'artistPublicProfile'])->name('artist.public.profile');

# public profile curator
Route::get('taste-maker/public/{user:name}',[CuratorController::class,'curatorPublicProfile'])->name('taste.maker.public.profile');

# Gift Card Route
Route::get('gift-card',[GiftCardController::class, 'index'])->name('card-gift');
Route::get('checkout-gift-card',[GiftCardController::class, 'checkout'])->name('checkout.gift.card');
Route::get('success-checkout/session_id={session_id}',[GiftCardController::class, 'checkoutSuccess'])->name('checkout.success');
Route::get('failure-checkout/session_id={session_id}',[GiftCardController::class, 'checkoutFailure'])->name('checkout.failure');
Route::get('gift-card-claim/{session_id}',[GiftCardController::class, 'giftCardClaim'])->name('gift-card-claim');

// Route::group(['middleware' => ['web'], 'namespace' => '\BinshopsBlog\Controllers'], function () {

//     /** The main public facing blog routes - show all posts, view a category, view a single post, also the add comment route */
//     Route::group(['prefix' => "/{locale}/".config('binshopsblog.blog_prefix', 'blog')], function () {
//         Route::get('/', [BinshopsReaderController::class,'index'])
//             ->name('binshopsblog.index');

//     });
// });
/***************************************************** Pages Routes *********************************************************/



<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Artist\CampaignController;
use App\Http\Controllers\Artist\MessageController;
use App\Http\Controllers\Artist\OfferController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistTrackController;
use App\Http\Controllers\ArtistWalletController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PromoteYourTrackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes


/***************************************************** Artist Routes *********************************************************/
// Dashboard Route
Route::get('dashboard', [DashboardController::class,'index']);
Route::get('/artist-profile', [ArtistController::class,'artistProfile']);
Route::post('update-artist-profile', [ArtistController::class, 'updateArtistProfile']);
Route::post('upload-artist-profile', [ArtistController::class, 'uploadArtistProfile']);
Route::post('artist-change-password', [ArtistController::class, 'artistChangePassword']);

// artist tracks routes
Route::get('tracks', [ArtistTrackController::class, 'index']);
Route::get('add-track', [ArtistTrackController::class, 'create']);
Route::post('store-track', [ArtistTrackController::class, 'store'])->name('artist.track.store');
Route::get('view-track/{artist_track}', [ArtistTrackController::class, 'show']);
Route::get('edit-track/{artist_track}', [ArtistTrackController::class, 'edit']);
Route::post('update-track/{artist_track}',[ArtistTrackController::class,'update']);
Route::delete('delete-track/{artist_track}',[ArtistTrackController::class,'destroy']);
Route::post('request-edit-track', [ArtistTrackController::class,'requestTrackEdit'])->name('request.edit.track');
Route::delete('delete-track-image',[ArtistTrackController::class,'destroyImgPdf']);

// promote your track
Route::get('welcome-your-track', [PromoteYourTrackController::class, 'index']);
Route::get('promote-your-track', [PromoteYourTrackController::class, 'addYourTrack']);
Route::post('store/track/campaign', [PromoteYourTrackController::class, 'storeTrackCampaign'])->name('store.Track.Campaign');
Route::get('get-curators', [PromoteYourTrackController::class, 'getCurators']);
Route::post('track-add-store', [PromoteYourTrackController::class, 'storeAddTrack'])->name('storeTrack');

// Wallet Shop Route
Route::get('/wallet',[ArtistWalletController::class,'wallet']);
Route::post('/checkout',[ArtistWalletController::class,'checkout']);
Route::get('/artist-checkout',[ArtistWalletController::class,'artistCheckout'])->name('checkout.artist');
Route::post('/artist-billing-info',[ArtistWalletController::class,'artistBillingInfo']);

// Stripe Route
Route::post('/stripe-payment', [ArtistWalletController::class, 'handlePost']);

// PayPal Route
Route::post('process-transaction', [PayPalController::class, 'processTransaction']);
Route::get('success-transaction', [PayPalController::class, 'successTransaction']);
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction']);

// active campaign routes
Route::get('campaigns', [CampaignController::class,'activeCampaign'])->name('active.campaign');
Route::delete('delete-campaign/{campaign}',[CampaignController::class,'destroy'])->name('delete.campaign');

// get cites
Route::get('get-cites-artist/{id}', [AjaxController::class,'getCities']);

// public profile artist
Route::post('artist/change-public-profile',[ArtistController::class,'artistChangeStatusProfile'])->name('artist.change.public.profile');
//Route::get('artist/public/{user:name}',[ArtistController::class,'artistPublicProfile'])->name('artist.public.profile');

// offers routes
Route::get('artist-offers', [OfferController::class,'offers'])->name('artist.offers');
Route::get('pending-offer', [OfferController::class,'pending'])->name('artist.pending');
Route::get('accepted-offer', [OfferController::class,'accepted'])->name('artist.accepted');
Route::get('rejected-offer', [OfferController::class,'rejected'])->name('artist.rejected');
Route::get('alternative-offer', [OfferController::class,'alternative'])->name('artist.alternative');
Route::get('artists-submissions-offer', [OfferController::class,'artistsSubmissions'])->name('artist.artists.submissions');
Route::get('completed-offer', [OfferController::class,'completed'])->name('artist.completed');
Route::get('new-offer', [OfferController::class,'new'])->name('artist.new');
Route::get('proposition-offer', [OfferController::class,'proposition'])->name('artist.proposition');
// offers routes

// offer detail route
Route::get('curator-offer/{send_offer}', [OfferController::class,'offerShow'])->name('artist.offer.show');
// offer detail route


// offer decline route
Route::post('offer-decline', [OfferController::class,'declineOffer'])->name('artist.offer.decline');
// offer decline route

// offer decline route
Route::post('offer-free-alternative', [OfferController::class,'freeAlternativeOffer'])->name('artist.offer.free.alternative');
// offer decline route

//
/// // offer pay usc route
Route::post('offer-pay', [OfferController::class,'payUSCeOffer'])->name('artist.offer.pay');
// offer pay usc route

// messages routes
Route::get('messages', [MessageController::class,'messages'])->name('artist.messages');
Route::get('new-messages', [MessageController::class,'new'])->name('artist.new.messages');
Route::get('viewed-messages', [MessageController::class,'viewed'])->name('artist.viewed.messages');
Route::get('responses-messages', [MessageController::class,'responses'])->name('artist.responses.messages');
// messages routes

/***************************************************** Artist Routes *********************************************************/

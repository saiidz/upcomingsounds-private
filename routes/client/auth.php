<?php

use App\Http\Controllers\AjaxController;
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
Route::post('store-track', [ArtistTrackController::class, 'store']);
Route::get('view-track/{artist_track}', [ArtistTrackController::class, 'show']);
Route::get('edit-track/{artist_track}', [ArtistTrackController::class, 'edit']);
Route::post('update-track/{artist_track}',[ArtistTrackController::class,'update']);
Route::delete('delete-track/{artist_track}',[ArtistTrackController::class,'destroy']);

// promote your track
Route::get('promote-your-track', [PromoteYourTrackController::class, 'index']);
Route::get('add-your-track', [PromoteYourTrackController::class, 'addYourTrack']);
Route::post('store/track/campaign', [PromoteYourTrackController::class, 'storeTrackCampaign']);
Route::get('get-curators', [PromoteYourTrackController::class, 'getCurators']);

// Wallet Shop Route
Route::get('/wallet',[ArtistWalletController::class,'wallet']);
Route::post('/checkout',[ArtistWalletController::class,'checkout']);
Route::get('/artist-checkout',[ArtistWalletController::class,'artistCheckout']);
Route::post('/artist-billing-info',[ArtistWalletController::class,'artistBillingInfo']);

// Stripe Route
Route::post('/stripe-payment', [ArtistWalletController::class, 'handlePost']);

// Paypal Route
Route::post('process-transaction', [PayPalController::class, 'processTransaction']);
Route::get('success-transaction', [PayPalController::class, 'successTransaction']);
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction']);



// get cites
Route::get('get-cites/{id}', [AjaxController::class,'getCities']);
/***************************************************** Artist Routes *********************************************************/

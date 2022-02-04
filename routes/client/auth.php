<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistTrackController;
use App\Http\Controllers\ArtistWalletController;
use App\Http\Controllers\DashboardController;
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

// Wallet Shop Route
Route::get('/wallet',[ArtistWalletController::class,'wallet']);

// Stripe Route
Route::post('/stripe-payment', [ArtistWalletController::class, 'handlePost']);
/***************************************************** Artist Routes *********************************************************/

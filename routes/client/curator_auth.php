<?php

use App\Http\Controllers\Curator\OfferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Curator\CuratorController;
use App\Http\Controllers\Curator\CuratorWalletController;
use App\Http\Controllers\Curator\ArtistSubmissionController;
use App\Http\Controllers\Curator\CuratorVerificationFormController;

// User Routes


/***************************************************** Curator Routes *********************************************************/

Route::get('/taste-maker-profile', [CuratorController::class,'curatorProfile']);
Route::post('update-curator-profile', [CuratorController::class, 'updateCuratorProfile']);
Route::post('upload-curator-profile', [CuratorController::class, 'uploadCuratorProfile']);
Route::post('/store-curator-tag', [CuratorController::class, 'storeCuratorTag'])->name('add.curator.tag');
Route::delete('delete-feature-tag',[CuratorController::class,'deleteCuratorTag']);
Route::post('curator-change-password', [CuratorController::class, 'curatorChangePassword']);

// Wallet Shop Route
Route::get('/taste-maker-wallet',[CuratorWalletController::class,'wallet'])->name('curator.wallet');

// Wallet Transfer Route
Route::post('curator-transfer',[CuratorWalletController::class,'curatorTransfer'])->name('curator.transfer');

// artist submissions
Route::get('/dashboard', [ArtistSubmissionController::class,'curatorDashboard'])->name('curator.dashboard');
Route::get('get-active-campaign', [ArtistSubmissionController::class,'getActiveStore'])->name('get.active.campaign');
Route::get('/artist-submission', [ArtistSubmissionController::class,'artistSubmission'])->name('artist.submission');
Route::get('/saved', [ArtistSubmissionController::class,'artistSaved'])->name('artist.saved');
Route::get('/accepted', [ArtistSubmissionController::class,'artistAccepted'])->name('accepted.artist');
Route::get('/rejected', [ArtistSubmissionController::class,'artistRejected'])->name('rejected.artist');

// favorite tracks
Route::get('favorite-track', [ArtistSubmissionController::class,'favoriteTrack'])->name('curator.favorite.track');

// get cites
Route::get('get-cites/{id}', [AjaxController::class,'getCities']);

// get verified
Route::get('/taste-maker/get-verified', [ArtistSubmissionController::class,'getVerified'])->name('curator.get.verified');

// curator verification form
Route::post('store-verification-form', [CuratorVerificationFormController::class, 'storeVerificationForm'])->name('curator.verification.form');

// offers routes
Route::get('offers', [OfferController::class,'offers'])->name('curator.offers');
Route::get('offer-pending', [OfferController::class,'pending'])->name('curator.pending');
Route::get('offer-accepted', [OfferController::class,'accepted'])->name('curator.accepted');
Route::get('offer-rejected', [OfferController::class,'rejected'])->name('curator.rejected');
Route::get('offer-alternative', [OfferController::class,'alternative'])->name('curator.alternative');
Route::get('offer-artists-submissions', [OfferController::class,'artistsSubmissions'])->name('curator.artists.submissions');
Route::get('offer-completed', [OfferController::class,'completed'])->name('curator.completed');
Route::get('offer-proposition', [OfferController::class,'proposition'])->name('curator.proposition');
// offers routes

/***************************************************** Curator Routes *********************************************************/

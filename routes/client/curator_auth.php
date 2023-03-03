<?php

use App\Http\Controllers\Curator\OfferController;
use App\Http\Controllers\Curator\OfferTemplateController;
use App\Http\Controllers\Curator\SavedArtistController;
use App\Http\Controllers\Curator\SendOfferController;
use App\Http\Controllers\Curator\SubmitWorkController;
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

// favorite artist
Route::get('favorite-artist', [ArtistSubmissionController::class,'favoriteArtist'])->name('curator.favorite.artist');

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
Route::get('offer-expired', [OfferController::class,'expired'])->name('curator.expired');
Route::get('offer-alternative', [OfferController::class,'alternative'])->name('curator.alternative');
Route::get('offer-artists-submissions', [OfferController::class,'artistsSubmissions'])->name('curator.artists.submissions');
Route::get('offer-completed', [OfferController::class,'completed'])->name('curator.completed');
// offers routes

// offer templates routes
Route::get('offer-proposition', [OfferTemplateController::class,'index'])->name('curator.proposition');
Route::get('create-offer-template', [OfferTemplateController::class,'create'])->name('curator.create.offer.template');
Route::post('store-offer-template', [OfferTemplateController::class, 'storeOfferTemplate'])->name('curator.store.offer.template');
Route::get('offer-template', [OfferTemplateController::class,'show'])->name('curator.show.offer.template');
Route::get('edit-offer-template/{offer_template}', [OfferTemplateController::class,'edit'])->name('curator.edit.offer.template');
Route::post('update-offer-template/{offer_template}', [OfferTemplateController::class, 'updateOfferTemplate'])->name('curator.update.offer.template');
Route::post('offer/change-status',[OfferTemplateController::class,'offerChangeStatus'])->name('curator.change.status');
Route::delete('delete-offer-template/{offer_template}',[OfferTemplateController::class,'destroy']);
// offer templates routes

// create an offer
Route::get('offer-template-create', [OfferTemplateController::class,'directCreateOfferTemplate'])->name('curator.direct.create.offer.template');
// create an offer

// submit work offer
Route::post('submit-work', [SubmitWorkController::class,'submitWork'])->name('curator.submit.work');
// submit work offer

// saved artist routes
Route::get('saved-artists', [SavedArtistController::class,'savedArtist'])->name('curator.saved.artists');
// saved artist routes

// complete alternative work offer
Route::post('complete-alternative-work', [SubmitWorkController::class,'completeAlternativeWork'])->name('curator.complete.alternative.work');
// complete alternative work offer

// send offer to artist route
Route::post('send-offer', [SendOfferController::class, 'sendOffer'])->name('curator.send.offer');
Route::get('send-offer/{send_offer}', [SendOfferController::class,'sendOfferShow'])->name('curator.send.offer.show');
// send offer to artist route
/***************************************************** Curator Routes *********************************************************/

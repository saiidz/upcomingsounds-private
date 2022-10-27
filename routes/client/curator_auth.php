<?php

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

// Wallet Shop Route
Route::get('/taste-maker-wallet',[CuratorWalletController::class,'wallet']);

// Wallet Transfer Route
Route::post('curator-transfer',[CuratorWalletController::class,'curatorTransfer'])->name('curator.transfer');

// artist submissions
Route::get('/dashboard', [ArtistSubmissionController::class,'curatorDashboard'])->name('curator.dashboard');
Route::get('/artist-submission', [ArtistSubmissionController::class,'artistSubmission'])->name('artist.submission');
Route::get('/saved', [ArtistSubmissionController::class,'artistSaved'])->name('artist.saved');
Route::get('/accepted', [ArtistSubmissionController::class,'artistAccepted'])->name('accepted.artist');
Route::get('/rejected', [ArtistSubmissionController::class,'artistRejected'])->name('rejected.artist');
// get cites
Route::get('get-cites/{id}', [AjaxController::class,'getCities']);

// get verified
Route::get('/taste-maker/get-verified', [ArtistSubmissionController::class,'getVerified'])->name('curator.get.verified');

// curator verificatio form
Route::post('store-verfication-form', [CuratorVerificationFormController::class, 'storeVerificationForm'])->name('curator.verfication.form');

/***************************************************** Curator Routes *********************************************************/

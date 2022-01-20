<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\ArtistSignupController;
use App\Http\Controllers\Curator\CuratorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsLetterSubscriptionController;
use App\Http\Controllers\TicketHelpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
Route::get('blog', [DashboardController::class,'blog']);
Route::get('how-to-help', [DashboardController::class,'help']);
Route::get('help/ticket', [TicketHelpController::class,'helpTicket']);
Route::post('help/ticket', [TicketHelpController::class,'postHelpTicket']);
Route::post('newsletter', [NewsLetterSubscriptionController::class,'newsLetter']);


/***************************************************** Pages Routes *********************************************************/

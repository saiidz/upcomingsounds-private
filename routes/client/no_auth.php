<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\ArtistSignupController;
use App\Http\Controllers\Curator\CuratorController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/***************************************************** Artist Routes *********************************************************/

// Artist Routes
Route::get('artist-home', [ArtistSignupController::class,'index']);
Route::get('artists', [ArtistSignupController::class,'artists']);
Route::get('privacy-policy', [DashboardController::class,'privacyPolicy']);
Route::get('term-of-service', [DashboardController::class,'termOfService']);
Route::get('about-us', [DashboardController::class,'aboutUs']);
Route::get('contact-us', [DashboardController::class,'contactUs']);
Route::post('contact-us',[DashboardController::class,'contactUsPost']);
Route::get('blog', [DashboardController::class,'blog']);
Route::get('faq', [DashboardController::class,'faq']);

// Artist Signup


/***************************************************** Artist Routes *********************************************************/
Route::get('for-artists', [ArtistController::class,'forArtists']);

/***************************************************** Curators Routes *********************************************************/

// Curators Routes
Route::get('curator-home', [CuratorController::class,'index']);
Route::get('for-curators', [CuratorController::class,'forCurators']);

// Curators Signup


/***************************************************** Curators Routes *********************************************************/

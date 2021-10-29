<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\ArtistSignupController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/***************************************************** Artist Routes *********************************************************/

// Artist Routes
Route::get('artist-home', [ArtistSignupController::class,'index']);
Route::get('artists', [ArtistSignupController::class,'artists']);
Route::get('privacy-policy', [DashboardController::class,'privacyPolicy']);
Route::get('term-of-service', [DashboardController::class,'termOfService']);

// Artist Signup


/***************************************************** Artist Routes *********************************************************/

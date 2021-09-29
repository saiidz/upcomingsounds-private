<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\ArtistSignupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/***************************************************** Artist Routes *********************************************************/

// Artist Routes
Route::get('artist-home', [ArtistSignupController::class,'index']);
Route::get('artists', [ArtistSignupController::class,'artists']);

// Artist Signup


/***************************************************** Artist Routes *********************************************************/

<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistTrackController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes


/***************************************************** Artist Routes *********************************************************/
// Dashboard Route
Route::get('dashboard', [DashboardController::class,'index']);
Route::get('artist-profile', [ArtistController::class,'artistProfile']);
Route::post('update-artist-profile', [ArtistController::class, 'updateArtistProfile']);
Route::post('upload-artist-profile', [ArtistController::class, 'uploadArtistProfile']);
// artist tracks routes
Route::get('tracks', [ArtistTrackController::class, 'index']);
Route::get('add-track', [ArtistTrackController::class, 'create']);
Route::post('store-track', [ArtistTrackController::class, 'store']);
Route::get('edit-track/{artist_track}', [ArtistTrackController::class, 'edit']);
Route::post('update-track/{artist_track}',[ArtistTrackController::class,'update']);
Route::delete('delete-track/{artist_track}',[ArtistTrackController::class,'destroy']);
/***************************************************** Artist Routes *********************************************************/

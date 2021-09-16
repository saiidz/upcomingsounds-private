<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes
Route::get('artist-home', [ArtistController::class,'index']);

<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes


/***************************************************** Front *********************************************************/
// Dashboard Route
Route::get('dashboard', [DashboardController::class,'index']);


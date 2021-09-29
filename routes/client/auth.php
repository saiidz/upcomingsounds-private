<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes


/***************************************************** Artist Routes *********************************************************/
// Dashboard Route
Route::get('dashboard', [DashboardController::class,'index']);

/***************************************************** Artist Routes *********************************************************/

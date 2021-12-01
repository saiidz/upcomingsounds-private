<?php

use App\Http\Controllers\Curator\CuratorController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes


/***************************************************** Curator Routes *********************************************************/

Route::get('/taste-maker-profile', [CuratorController::class,'curatorProfile']);

/***************************************************** Curator Routes *********************************************************/

<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Curator\CuratorController;
use App\Http\Controllers\Curator\CuratorWalletController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes


/***************************************************** Curator Routes *********************************************************/

Route::get('/taste-maker-profile', [CuratorController::class,'curatorProfile']);
// Wallet Shop Route
Route::get('/taste-maker-wallet',[CuratorWalletController::class,'wallet']);

// get cites
Route::get('get-cites/{id}', [AjaxController::class,'getCities']);
/***************************************************** Curator Routes *********************************************************/

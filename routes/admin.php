<?php

use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\BidderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SystemUserController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','verify_if_admin']], function() {
    Route::get('dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

    // Bidders route
    Route::resource('bidders',  BidderController::class);
    Route::get('view-bidder',  [BidderController::class,'viewBidder'])->name('viewBidder');
    Route::get('suspend-bidders',  [BidderController::class,'suspendBidders'])->name('suspendBidders');
    Route::get('block-bidders',  [BidderController::class,'blockBidders'])->name('blockBidders');
    // System Users route
    Route::resource('system-users',  SystemUserController::class);
    Route::get('view-system-user',  [SystemUserController::class,'viewSystemUser'])->name('viewSystemUser');


//    Route::any('/logout', [AuthenticatedSessionController::class, 'destroy']);

});


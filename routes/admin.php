<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SystemUserController;
use App\Http\Controllers\Admin\ArtistFeatureController;
use App\Http\Controllers\Admin\CuratorFeatureController;

Route::group(['as' => 'admin.','middleware' => ['auth','verify_if_admin']], function() {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class,'profile'])->name('profile');
    Route::post('update-profile/{profile}', [DashboardController::class,'storeProfile'])->name('update.profile');

    // Curators Features
    Route::resource('curator-features',  CuratorFeatureController::class);
    Route::get('curator-sub-feature/{id}',[CuratorFeatureController::class,'subFeature']);
    Route::get('curator-sub-feature/{id}/create',[CuratorFeatureController::class,'createSubFeature']);
    Route::post('curator-sub-feature/store', [CuratorFeatureController::class,'storeSubFeature']);
    Route::get('curator-sub-feature/{id}/edit',[CuratorFeatureController::class,'editSubFeature']);
    Route::post('curator-sub-feature/{id}/update', [CuratorFeatureController::class,'updateSubFeature']);
    Route::delete('curator-sub-feature/{id}/delete', [CuratorFeatureController::class,'deleteSubFeature']);

    // Artists Features
    Route::resource('artist-features',  ArtistFeatureController::class);
    Route::get('artist-sub-feature/{id}',[ArtistFeatureController::class,'subFeature']);
    Route::get('artist-sub-feature/{id}/create',[ArtistFeatureController::class,'createSubFeature']);
    Route::post('artist-sub-feature/store', [ArtistFeatureController::class,'storeSubFeature']);
    Route::get('artist-sub-feature/{id}/edit',[ArtistFeatureController::class,'editSubFeature']);
    Route::post('artist-sub-feature/{id}/update', [ArtistFeatureController::class,'updateSubFeature']);
    Route::delete('artist-sub-feature/{id}/delete', [ArtistFeatureController::class,'deleteSubFeature']);
//
//    // Bidders route
//    Route::resource('bidders',  BidderController::class);
//    Route::get('view-bidder',  [BidderController::class,'viewBidder'])->name('viewBidder');
//    Route::get('suspend-bidders',  [BidderController::class,'suspendBidders'])->name('suspendBidders');
//    Route::get('block-bidders',  [BidderController::class,'blockBidders'])->name('blockBidders');
//    // System Users route
//    Route::resource('system-users',  SystemUserController::class);
//    Route::get('view-system-user',  [SystemUserController::class,'viewSystemUser'])->name('viewSystemUser');


//    Route::any('/logout', [AuthenticatedSessionController::class, 'destroy']);

});



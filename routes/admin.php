<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\CuratorController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SystemUserController;
use App\Http\Controllers\Admin\TicketHelpController;
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

    // Artist Route
    Route::get('artist-approved', [ArtistController::class,'approvedArtist'])->name('approved.artist');
    Route::get('artist-pending', [ArtistController::class,'pendingArtist'])->name('pending.artist');
    Route::get('artist-profile/{user}',[ArtistController::class,'profileArtist'])->name('artist.profile');
    Route::post('store-artist-reject/{user}',[ArtistController::class,'storeRejectArtist'])->name('store.artist.reject');
    Route::post('store-approved-artist/{user}', [ArtistController::class,'storeApprovedArtist'])->name('store.approved.artist');
    Route::get('track-approved', [ArtistController::class,'approvedTrack'])->name('approved.track');
    Route::get('track-pending', [ArtistController::class,'pendingTrack'])->name('pending.track');
    Route::get('track-details/{artist_track}',[ArtistController::class,'trackDetails'])->name('artist.track.detail');
    Route::post('store-approved-track/{artist_track}', [ArtistController::class,'storeApprovedTrack'])->name('store.approved.track');
    Route::post('store-track-reject/{artist_track}',[ArtistController::class,'storeRejectTrack'])->name('store.track.reject');

    // Curator Route
    Route::get('curator-approved', [CuratorController::class,'approvedCurator'])->name('approved.curator');
    Route::get('curator-pending', [CuratorController::class,'pendingCurator'])->name('pending.curator');
    Route::get('curator-profile/{user}',[CuratorController::class,'profileCurator'])->name('curator.profile');
    Route::get('curator-verification', [CuratorController::class,'verificationCurator'])->name('verification.curator');
    Route::post('store-approved-curator/{user}', [CuratorController::class,'storeApprovedCurator'])->name('store.approved.curator');
    Route::post('store-curator-reject/{user}',[CuratorController::class,'storeRejectCurator'])->name('store.curator.reject');

    // curator verification form
    Route::get('curator-verification/{user}',[CuratorController::class,'curatorVerifcationShow'])->name('curator.verification.show');
    Route::post('store-verified-curator/{user}', [CuratorController::class,'storeVerifiedCurator'])->name('store.verified.curator');
    Route::post('store-rejected-curator/{user}', [CuratorController::class,'storeRejectedCurator'])->name('store.rejected.curator');

    // Help Tickets Route
    Route::get('tickets', [TicketHelpController::class,'helpTicket'])->name('help.ticket');
    Route::get('ticket/{ticket_help}',[TicketHelpController::class,'viewTicketHelp'])->name('view.ticket.help');
    Route::post('store-ticket/{ticket_help}', [TicketHelpController::class,'storeTicketHelp'])->name('store.ticket.help');
    Route::delete('ticket/{id}/delete', [TicketHelpController::class,'deleteTicket'])->name('delete.ticket.help');

    //Theme settings
    Route::get('theme/settings', [OptionController::class,'settingsEdit'])->name('theme.settings');
    Route::post('theme/settings-store', [OptionController::class,'settingsUpdate'])->name('theme.settings.store');

    // Frontend Route
    Route::get('frontend/settings/home-section', [FrontendController::class,'homeSection'])->name('home.settings');
    Route::post('theme/settings-home-store', [FrontendController::class,'homeSectionUpdate'])->name('home.section.store');
    Route::get('frontend/settings/about-section', [FrontendController::class,'aboutSection'])->name('about.settings');
    Route::post('theme/settings-about-store', [FrontendController::class,'aboutSectionUpdate'])->name('about.section.store');
    Route::get('frontend/settings/contact-section', [FrontendController::class,'contactSection'])->name('contact.settings');
    Route::post('theme/settings-contact-store', [FrontendController::class,'contactSectionUpdate'])->name('contact.section.store');
    Route::get('frontend/settings/for-artists-section', [FrontendController::class,'forArtistsSection'])->name('for.artists.settings');
    Route::post('theme/settings-for-artists-store', [FrontendController::class,'forArtistsSectionUpdate'])->name('for.artists.section.store');
    Route::get('frontend/settings/curators', [FrontendController::class,'curatorsSection'])->name('curators.settings');
    Route::post('theme/settings-curators', [FrontendController::class,'curatorsSettingUpdate'])->name('curators.store');


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



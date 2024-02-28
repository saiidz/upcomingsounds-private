<?php

use App\Http\Controllers\Admin\AlternativeOptionController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CuratorWithdrawalRequest;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\OfferTypeController;
use App\Http\Controllers\Admin\SendDirectOfferController;
use App\Http\Controllers\Admin\SubmitWorkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VerifiedCoverageController;
use App\Http\Controllers\Admin\VerifiedCoverageOfferTypeController;
use App\Http\Controllers\Admin\VerifiedCoverageSubmitWorkController;
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
    Route::delete('artist/{id}/destroy', [ArtistController::class,'deleteArtist'])->name('artist.destroy');

    // Curator Route
    Route::get('curator-approved', [CuratorController::class,'approvedCurator'])->name('approved.curator');
    Route::get('curator-pending', [CuratorController::class,'pendingCurator'])->name('pending.curator');
    Route::get('curator-profile/{user}',[CuratorController::class,'profileCurator'])->name('curator.profile');
    Route::get('curator-verification', [CuratorController::class,'verificationCurator'])->name('verification.curator');
    Route::post('store-approved-curator/{user}', [CuratorController::class,'storeApprovedCurator'])->name('store.approved.curator');
    Route::post('store-curator-reject/{user}',[CuratorController::class,'storeRejectCurator'])->name('store.curator.reject');
    Route::delete('curator/{id}/destroy', [CuratorController::class,'deleteCurator'])->name('curator.destroy');

    # curator verification form
    Route::get('curator-verification/{user}',[CuratorController::class,'curatorVerificationShow'])->name('curator.verification.show');
    Route::post('store-verified-curator/{user}', [CuratorController::class,'storeVerifiedCurator'])->name('store.verified.curator');
    Route::post('store-rejected-curator/{user}', [CuratorController::class,'storeRejectedCurator'])->name('store.rejected.curator');
    Route::get('allow-curator-verification/{user}', [CuratorController::class,'allowCuratorVerification'])->name('allow-curator-verification');
    Route::get('remove-curator-verification/{user}', [CuratorController::class,'removeAllowCuratorVerification'])->name('remove-allow-curator-verification');

    // Help Tickets Route
    Route::get('tickets', [TicketHelpController::class,'helpTicket'])->name('help.ticket');
    Route::get('ticket/{ticket_help}',[TicketHelpController::class,'viewTicketHelp'])->name('view.ticket.help');
    Route::post('store-ticket/{ticket_help}', [TicketHelpController::class,'storeTicketHelp'])->name('store.ticket.help');
    Route::delete('ticket/{id}/delete', [TicketHelpController::class,'deleteTicket'])->name('delete.ticket.help');

    //Theme settings
    Route::get('theme/settings', [OptionController::class,'settingsEdit'])->name('theme.settings');
    Route::post('theme/settings-store', [OptionController::class,'settingsUpdate'])->name('theme.settings.store');

    // Frontend Route
//    Route::get('frontend/settings/home-section', [FrontendController::class,'homeSection'])->name('home.settings');
    Route::get('frontend/settings/home-section-new', [FrontendController::class,'homeSectionNew'])->name('home.new.settings');
//    Route::post('theme/settings-home-store', [FrontendController::class,'homeSectionUpdate'])->name('home.section.store');
    Route::post('theme/settings-home-new-store', [FrontendController::class,'homeNewSectionUpdate'])->name('home.new.section.store');
    Route::get('frontend/settings/about-section', [FrontendController::class,'aboutSection'])->name('about.settings');
    Route::post('theme/settings-about-store', [FrontendController::class,'aboutSectionUpdate'])->name('about.section.store');
    Route::get('frontend/settings/contact-section', [FrontendController::class,'contactSection'])->name('contact.settings');
    Route::post('theme/settings-contact-store', [FrontendController::class,'contactSectionUpdate'])->name('contact.section.store');
    Route::get('frontend/settings/for-artists-section', [FrontendController::class,'forArtistsSection'])->name('for.artists.settings');
    Route::post('theme/settings-for-artists-store', [FrontendController::class,'forArtistsSectionUpdate'])->name('for.artists.section.store');
    Route::get('frontend/settings/curators', [FrontendController::class,'curatorsSection'])->name('curators.settings');
    Route::post('theme/settings-curators', [FrontendController::class,'curatorsSettingUpdate'])->name('curators.store');

    #Slider Home Page
    Route::resource('home-sliders',HomeSliderController::class);

    #Testimonials
    Route::resource('testimonials',TestimonialController::class);

    // active campaign artist
    Route::get('active-campaign', [ArtistController::class,'activeCampaign'])->name('campaign.active');
    Route::post('add-days/{campaign}',[ArtistController::class,'addDays'])->name('add-days');
    Route::post('banner-add/{campaign}',[ArtistController::class,'bannerAdd'])->name('banner-add');
    Route::post('banner-remove/{campaign}',[ArtistController::class,'bannerRemove'])->name('banner-remove');

    // banner routes
    Route::resource('banners',BannerController::class);
    Route::post('thumbnail-remove', [BannerController::class,'destroyThumbnail'])->name('banner.thumbnail.remove');
    Route::post('banner-image-remove', [BannerController::class,'destroyBannerImg'])->name('banner.img.remove');
    Route::post('audio-remove', [BannerController::class,'destroyAudio'])->name('banner.audio.remove');

    # Offer Type
    Route::get('offers',  [OfferTypeController::class, 'offers'])->name('offers');
    Route::get('offer-template-curator/{user}',[OfferTypeController::class,'curatorOfferTemplate'])->name('curator.template-offer');
    Route::delete('delete-offer-template/{offer_template}',[OfferTypeController::class,'destroyOfferTemplate'])->name('curator.delete.offer.template');
    Route::get('offer-template/{offer_template}',[OfferTypeController::class,'offerTemplate'])->name('template-offer');
    Route::post('store-approved-offer-template/{offer_template}', [OfferTypeController::class,'storeApprovedOfferTemplate'])->name('store.approved.OfferTemplate');
    Route::post('store-offer-template-reject/{offer_template}',[OfferTypeController::class,'storeRejectOfferTemplate'])->name('store.OfferTemplate.reject');
    Route::resource('offer-types',  OfferTypeController::class);
    Route::resource('alternative-options',  AlternativeOptionController::class);

    # Verified Coverage
    Route::get('curator-verified-coverage',  [VerifiedCoverageController::class, 'curatorVerifiedCoverage'])->name('curator.verified.coverage');
    Route::get('verified-coverage-curator/{user}',[VerifiedCoverageController::class,'verifiedCoverage'])->name('verified.coverage');
    Route::delete('delete-verified-coverage/{verified_coverage}',[VerifiedCoverageController::class,'destroyOfferTemplate'])->name('curator.delete.verified.coverage');
    Route::get('verified-coverage/{verified_coverage}',[VerifiedCoverageController::class,'showVerifiedCoverage'])->name('curator.show.verified.coverage');
    Route::post('store-approved-verified-coverage/{verified_coverage}', [VerifiedCoverageController::class,'storeApprovedVerifiedCoverage'])->name('store.approved.verified.coverage');
    Route::post('store-verified-coverage-reject/{verified_coverage}',[VerifiedCoverageController::class,'storeRejectVerifiedCoverage'])->name('store.verified.coverage.reject');

    Route::resource('verified-coverage-offer-types',  VerifiedCoverageOfferTypeController::class);

    // send direct offers
    Route::get('send-direct-offer',[SendDirectOfferController::class,'sendDirectOffer'])->name('curator.send.direct.offer');
    Route::get('send-direct-offer/{offer_template}',[SendDirectOfferController::class,'detailSendOfferTemplate'])->name('curator.send.direct.detail-offer');
    Route::post('send-direct-approved-offer/{offer_template}', [SendDirectOfferController::class,'storeDirectApprovedOfferTemplate'])->name('store.direct.approved.OfferTemplate');
    Route::post('send-direct-offer-reject/{offer_template}',[SendDirectOfferController::class,'storeDirectRejectOfferTemplate'])->name('store.direct.OfferTemplate.reject');

    // submit work offer
    Route::get('curator-submit-work', [SubmitWorkController::class,'submitWork'])->name('curator.submit.work');
    Route::get('curator-submit-work/{submitWork}', [SubmitWorkController::class,'detailSubmitWork'])->name('curator.submit.work.detail');
    Route::post('curator-submit-work-approved-offer/{submitWork}', [SubmitWorkController::class,'storeApprovedSubmitWork'])->name('store.curator.approved.submitWork');
    Route::post('curator-submit-work-reject/{submitWork}',[SubmitWorkController::class,'storeRejectSubmitWork'])->name('store.curator.submitWork.reject');
    Route::post('artist-refund-wallet/{submitWork}',[SubmitWorkController::class,'artistRefundWaller'])->name('artist.refund.waller');
    // submit work offer

    // Blog Route
    Route::resource('blog-users',  BlogController::class);


    # Curator Withdrawal Request
    Route::get('curator-withdrawal-request', [CuratorWithdrawalRequest::class,'curatorWithdrawalRequest'])->name('request.withdrawal.curator');
    Route::get('curator-withdrawal-request/{transactionHistory}', [CuratorWithdrawalRequest::class,'detailTransactionHistory'])->name('request.withdrawal.curator.detail');
    Route::post('curator-withdrawal-request-approved-offer/{transactionHistory}', [CuratorWithdrawalRequest::class,'storeApprovedTransactionHistory'])->name('store.curator.approved.withdrawal');
    Route::post('curator-withdrawal-request-reject/{transactionHistory}',[CuratorWithdrawalRequest::class,'storeRejectTransactionHistory'])->name('store.curator.withdrawal.reject');

    # submit work offer
    Route::get('verified-coverage-submit-work', [VerifiedCoverageSubmitWorkController::class,'submitWork'])->name('verified.coverage.submit.work');
    Route::get('verified-coverage-submit-work/{submitWork}', [VerifiedCoverageSubmitWorkController::class,'detailSubmitWork'])->name('verified.coverage.submit.work.detail');
    Route::post('verified-coverage-submit-work-approved/{submitWork}', [VerifiedCoverageSubmitWorkController::class,'storeApprovedSubmitWork'])->name('store.verified.coverage.approved.submitWork');
    Route::post('verified-coverage-submit-work-reject/{submitWork}',[VerifiedCoverageSubmitWorkController::class,'storeRejectSubmitWork'])->name('store.verified.coverage.submitWork.reject');
    Route::post('verified-coverage-artist-refund-wallet/{submitWork}',[VerifiedCoverageSubmitWorkController::class,'artistRefundWaller'])->name('verified.coverage.artist.refund.waller');
    # submit work offer
});



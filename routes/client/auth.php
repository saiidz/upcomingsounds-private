<?php

use App\Http\Controllers\Api\DefaultController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Auth\MobileAuthenticatedController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportController;
use App\Http\Controllers\Api\AuctionController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TransactionHistoryController;
// User Routes
//Route::post('update-profile',[PassportController::class,'updateProfile']);
//Route::post('verify-otp',[PassportController::class,'verifyOTP']);
//Route::get('get-profile',[PassportController::class,'getProfile']);
//Route::post('upload-profile',[PassportController::class,'uploadProfile']);
//Route::get('logout', [PassportController::class,'logout']);
//Route::delete('delete-document',[PassportController::class,'deleteDocument']);
//Route::get('/manage-password', [PassportController::class, 'managePassword']);
//Route::post('/create-password', [PassportController::class, 'createPassword']);

/***************************************************** Front *********************************************************/
// Dashboard Route
Route::get('dashboard', [DashboardController::class,'index']);
//Route::get('bids',[DashboardController::class,'bids']);
//Route::post('search-result',[DashboardController::class,'searchFilter']);
//Route::post('advanced-search-result',[DashboardController::class,'advancedSearchFilter']);

//Invoices Routes (Client Side) Invoice Controller
//Route::get('invoices',[InvoiceController::class,'index']);
//Route::get('get-invoice/{invoice}',[InvoiceController::class,'show']);
////Transaction History Routes (Client Side)
//Route::get('get-transaction-history/{invoice}',[InvoiceController::class,'showTransactionHistory']);
//Route::get('get-all-transactions',[InvoiceController::class,'showAllTransactions']);
//Route::get('generate-orders',[InvoiceController::class,'generateOrders']);


//Orders Routes (Client Side)
//Route::get('orders',[OrderController::class,'index']);
//Route::get('get-order/{order}',[OrderController::class,'show']);
//
//// Default APis
//Route::get('categories',[DefaultController::class,'getCategories']);
//Route::get('countries',[DefaultController::class,'getCountries']);
////Route::get('states',[DefaultController::class,'getStates']);
//Route::get('get-cities-search/{id}',[DefaultController::class,'getCitiesSearchFilters']);
//Route::get('feature-tag',[DefaultController::class,'getFeatureTags']);
//Route::get('search-filter',[DefaultController::class,'getSearchFilter']);
//
//// Contact Us
//Route::get('contact-us',[DashboardController::class,'contactUs']);
//Route::get('privacy-policy',[DashboardController::class,'PrivacyPolicy']);
//Route::get('notifications',[DashboardController::class,'Notifications']);

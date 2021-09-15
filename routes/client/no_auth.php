<?php

use App\Http\Controllers\Api\PassportController;
use App\Http\Controllers\Auth\MobileAuthenticatedController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes
//Route::get('user', [VehicleController::class, 'index']);
Route::get('/', function (){
    return view('welcome');
});
//Route::post('signup', [PassportController::class, 'signup'])->name('signup');
//Route::post('login',[PassportController::class,'login']);
//Route::post('continue-with-phone-number',[PassportController::class,'continueWithPhoneNumber']);
//Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);

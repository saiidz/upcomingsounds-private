<?php

use App\Http\Controllers\Admin\AjaxController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Helpers\Helper;
use Twilio\Rest\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/clear-cache', function(){
//    Artisan::call('cache:clear');
//    Artisan::call('config:clear');
//    Artisan::call('route:clear');
//    Artisan::call('view:clear');
//    return "Cache Clear";
//});

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/', function () {
//    return view('welcome');
//})->middleware('guest');

require __DIR__.'/auth.php';


Route::group(['middleware' => ['try_catch']], function() {

    /***************************************************** Admin *********************************************************/

    Route::prefix('admin')->group(base_path('routes/admin.php'));

    /***************************************************** Artist Routes *********************************************************/
    Route::group(['middleware' => ['auth','verify_if_user','create_password','artist_signup','verified']], function() {
        Route::prefix('')->group(base_path('routes/client/auth.php'));
    });

    /***************************************************** Curators Routes *********************************************************/
    Route::group(['middleware' => ['auth','verify_if_curator','create_curator_password','verified','verified_phone_number_curator','curator_signup','approved_curator_admin']], function() {
        Route::prefix('')->group(base_path('routes/client/curator_auth.php'));
    });


    Route::prefix('')->group(base_path('routes/client/no_auth.php'));
});

Route::any('{url?}/{sub_url?}', [Helper::class, 'fallback']);

<?php

use App\Http\Controllers\Admin\AjaxController;
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
    Route::group(['middleware' => ['auth','verify_if_user', 'check_if_blocked','artist_signup','verified']], function() {
        Route::prefix('')->group(base_path('routes/client/auth.php'));
    });


    Route::prefix('')->group(base_path('routes/client/no_auth.php'));
});

Route::any('{url?}/{sub_url?}', [Helper::class, 'fallback']);

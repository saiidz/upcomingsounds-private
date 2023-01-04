<?php

use App\Http\Controllers\Admin\AjaxController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\Helper;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('get-states/{id}', [AjaxController::class,'getStates']);
Route::get('get-cites/{id}', [AjaxController::class,'getCities']);

Route::group(['middleware' => ['try_catch']], function() {

    /***************************************************** Front *********************************************************/
//    Route::group(['middleware' => ['auth:api', 'check_if_blocked']], function() {
//         Route::prefix('')->group(base_path('routes/client/auth.php'));
//    });

//     Route::prefix('')->group(base_path('routes/client/no_auth.php'));
});

Route::any('{url?}/{sub_url?}', [Helper::class, 'fallback']);

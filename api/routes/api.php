<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BoardController;

/*
|--------------------------------------------------------------------------
| API_Index Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API_Index routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API_Index!
|
*/


Route::group(['middleware' => ['api']], function () {
    Route::options('boards', function() {
        return response()->json();
    });
    Route::resource('boards', 'App\Http\Controllers\API\BoardController', ['except' => ['create']]);
});




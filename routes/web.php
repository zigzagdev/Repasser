<?php

use Illuminate\Support\Facades\Route;
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

Route::group(['prefix' => 'admin'],function (){

    Route::post('/deedCreateAccount','App\Http\Controllers\AccountController@deedCreateAccount')->name('deedCreateAccount');
    //アカウント編集画面
    Route::get('/deedEditAccount','App\Http\Controllers\AccountController@deedEditAccount')->name('deedEditAccount');
    //アカウント削除画面
    Route::delete('/deedDeleteAccount','App\Http\Controllers\AccountController@deedDeleteAccount')->name('deedDeleteAccount');
});





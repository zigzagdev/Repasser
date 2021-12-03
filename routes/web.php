<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;


    Route::get('/', function () {
    return view('index');
    });
    //アカウント詳細画面
    Route::get('/admin/deedShowAccount', [AccountController::class, function(){
        return view('admin/deedShowAccount');
    }]);

    //アカウント編集画面
    Route::get('/admin/deedEditAccount/{id}', [AccountController::class, function(){
    return view('admin/deedEditAccount');
    }]);

    //アカウント削除画面
    Route::delete('/deedDeleteAccount','App\Http\Controllers\AccountController@deedDeleteAccount')->name('deedDeleteAccount');
    Route::delete('/admin/deedDeleteAccount/{id}', [AccountController::class, function(){
    return view('admin/deedDeleteAccount');
}   ]);

    //アカウント登録画面
    Route::post('/admin/deedCreateAccount', [AccountController::class, function(){
    return view('admin/deedCreateAccount');
    }]);

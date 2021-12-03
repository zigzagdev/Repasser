<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;


    Route::get('/', function () {
    return view('index');
    });
    //each_account_index
    Route::get('/admin/deedShowAccount', [AccountController::class, function(){
        return view('admin/deedShowAccount');
    }]);

    //account_edit
    Route::put('/admin/deedEditAccount/{id}', [AccountController::class, function(){
    return view('admin/deedEditAccount');
    }]);

    //account_delete
    Route::delete('/admin/deedDeleteAccount/{id}', [AccountController::class, function(){
    return view('admin/deedDeleteAccount');
}   ]);

    //account_register
    Route::post('/admin/deedCreateAccount', [AccountController::class, function(){
    return view('admin/deedCreateAccount');
    }]);

    //register_item(already_registered_account)
    Route::post('/admin/item/deedCreateAccount', [ItemController::class, function(){
    return view('/admin/item/CreateAccount');
    }]);

    Route::post('/item/deedCreateAccount', [AccountController::class, function(){
    return view('item/CreateAccount');
}   ]);

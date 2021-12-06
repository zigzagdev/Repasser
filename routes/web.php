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
    return view('/');
}   ]);

    //register_item(already_registered_account)
    Route::get('/admin/item/deedCreateAccount', [ItemController::class, function(){
    return view('/admin/item/CreateAccount');
    }]);

//    account_register
    Route::get('/admin/deedCreateAccount', [AccountController::class, function(){
    return view('admin/deedCreateAccount');
    }]);

Route::get('/SearchItem', [SearchController::class, function(){
    return view('/SearchItem');
}   ]);



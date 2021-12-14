<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
    return view('index');
    });

    //each_account_index
    Route::get('/admin/deedAccountShow/{id}', 'AccountController@deedAccountShow');

//    //account_edit_screen_show
    Route::get('/admin/deedEditAccount/{id}', 'AccountController@deedEditAccount');

//    account_update_deed
    Route::put('/admin/deedEditAccount/{id}','AccountController@deedEditAccount');

//    //account_delete
//    Route::delete('/admin/deedDeleteAccount/{id}', [AccountController::class, function(){
//    return view('/');
//}   ]);　　　
     Route::delete('/admin/deedDeleteAccount/{id}', 'AccountController@deedDeleteAccount');
//
//    //register_item(already_registered_account)
     Route::post('/admin/item/deedCreateAccount', 'ItemController@deedCreateAccount');

       //account_register
     Route::get('/admin/deedCreateAccount', 'AccountController@deedCreateAccount');
//     Route::post('/admin/deedCreateAccount', 'AccountController@deedCreateAccount');
////     ItemSearch
//    Route::get('/SearchItem', [SearchController::class, function(){
//    return view('/SearchItem');
//}   ]);



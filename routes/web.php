<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//    all_accounts_index
Route::get('/admin/deedIndexSearch', 'AccountController@deedIndexSearch');

//each_account_index
Route::get('/admin/deedAccountShow/{id}', 'AccountController@deedAccountShow');

//     account_edit_screen_show
Route::get('/admin/deedEditAccount/{id}', 'AccountController@deedEditAccount');

//     account_update_deed   actionでControllerの内容書いてあげると、GETとPUT等のメソッドを書いてあげる。
Route::put('/admin/deedEditAccount/{id}', 'AccountController@deedUpdateAccount');

//    //account_delete
Route::get('/admin/deedDeleteAccount/{id}', 'AccountController@deedDeleteAccount');

//    delete_action
Route::delete('/admin/deedDeleteAccount/{id}', 'AccountController@deedDeleteComplete');

//     register_item(already_registered_account)
Route::post('/admin/item/deedCreateAccount', 'ItemController@deedCreateAccount');

//     account_register_form
Route::get('/admin/deedCreateAccount', 'AccountController@deedCreateAccount');

//  account_search
Route::get('/admin/SearchResult', 'AccountController@SearchResult');
//     account_register_function
Route::post('/admin/deedCreateAccount', 'AccountController@deedCreateAccountAction');

////     ItemSearch
//    Route::get('/SearchItem', [SearchController::class, function(){
//    return view('/SearchItem');
//}   ]);



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

//     account_register_form
Route::get('/admin/deedCreateAccount', 'AccountController@deedCreateAccount');

//  account_search
Route::get('/admin/SearchResult', 'AccountController@SearchResult');
//     account_register_function
Route::post('/admin/deedCreateAccount', 'AccountController@deedCreateAccountAction');

//  item_create
Route::get( 'admin/item/deedCreateItem/{id}',function ($id){
    return view('item/deedCreateItem');
});

//  register_item(already_registered_account)
Route::post( 'admin/item/deedCreateItem/{id}',function ($id){
    return view('item/deedCreateItem');
});

//  show_item
Route::get('admin/item/deedShowItem/{id}/{item_name}', 'ItemController@deedShowItem');

//  item_edit
Route::get(' admin/item/deedEditItem/{id}','ItemController@deedEdititem');

// item_update_function
Route::put(' admin/item/deedEditItem/{id}/{item_name}','ItemController@deedUpdateitem');

// item_delete
Route::get(' admin/item/deedEditItem/{id}/{item_name}','ItemController@deedDeleteitem');

// item_delete_function
Route::delete(' admin/item/deedDeleteItem/{id}/{item_name}','ItemController@deedDeleteComplete');

// item_search
Route::get('SearchItem', 'SearchController@SearchItem');

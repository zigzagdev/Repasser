<?php

use Illuminate\Support\Facades\Route;

// TopPage (QueryBuilder内にて、recommend_flagで正を表しているアイテムだけを$itemの中に入れている)
Route::get('/', function () {
    $item = DB::table('items')->where('recommend_flag', '1')->get();

    return view('index', ['item' => $item]);
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
Route::get( 'admin/item/deedCreateItem/{id}','ItemController@deedCreateItem');

//  register_item(already_registered_account)
Route::post( 'admin/item/deedCreateItem/{id}','ItemController@deedCreateItemAction');

//  show_item
Route::get('admin/deedShowItem/{id}', 'ItemController@deedShowItem');

//  item_edit
Route::get('item/deedEditItem/{id}','ItemController@deedEditItem');

// item_update_function
Route::put('item/deedEditItem/{id}','ItemController@deedUpdateItem');

// item_delete
Route::get('item/deedDeleteItem/{id}','ItemController@deedDeleteItem');

// item_delete_function
Route::delete('item/deedDeleteItem/{id}','ItemController@deedDeleteComplete');

// item_search
Route::get('SearchItem', 'SearchController@SearchItem');


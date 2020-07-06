<?php

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
    return view('index');
});

// start route for adding and updating shop //
Route::get('/addShop', 'ShopController@addShop');
Route::post('/addShop', 'ShopController@addShop');
Route::put('/addShop/{id}', 'ShopController@editShop');

//start route for adding menu
Route::get('/addMenuItem/{sid}', 'ShopController@addMenu');
Route::post('/addMenuItem/{sid}', 'ShopController@addMenu');

//start route for listing shop
Route::get('/listAllShop',function () {
    return view('shop.listShop');
});
Route::get('/getAllShop/{limit?}/{sortBy?}/{status?}', 'ShopController@getAllShop');

//start route for fetching shop details
Route::get('/getShopDetail/{sid}', 'ShopController@fetchShopDetail');






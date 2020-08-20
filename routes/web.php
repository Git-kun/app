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


Route::get('/', 'ShopController@index'); //最初に表示する画面
Route::get('/mycart', 'ShopController@myCart')->middleware('auth'); //自分のカートの中
Route::post('/mycart', 'ShopController@addMycart'); //カートにPOSTで商品を追加
Route::post('/cartdelete', 'ShopController@deleteCart'); //カート内の商品を削除
Route::post('/checkout', 'ShopController@checkout'); //商品を購入

// Route::get('/', function () {
//     return view('shop');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

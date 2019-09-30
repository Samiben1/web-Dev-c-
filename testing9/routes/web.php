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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/food', 'HomeController@index')->name('home');
Route::get('/select_order/{id}','HomeController@selectorder' );

Route::get('/restaurant','RestaurantController@index');
Route::get('/dishes','RestaurantController@dishes');
Route::post('/dishadd','RestaurantController@dishadd');
Route::get('/dishupdate/{id}','RestaurantController@dishupdate');
Route::post('/dishdel','RestaurantController@dishdel');
Route::get('/orders', 'RestaurantController@orders');

Route::get('/admin','AdminController@index');
Route::get('/approve/{id?}','AdminController@approve');

Route::get('/addcart/{u_id}/{r_id}/{item_id}','CartController@addcart');
Route::get('/order/{id}','CartController@getordered');
Route::get('/remove/{id}','CartController@remove');

Route::get('/files', function(){
    return view ('documentation');
});
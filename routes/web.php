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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductsController');

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);
Route::get('/product/{id}', [
    'uses' => 'FrontEndController@singleProduct',
    'as' => 'product.single'
]);

Route::resource('/cart','ShoppingController');

Route::get('/cart/destroy/{id}','ShoppingController@destroy')->name('cart.destroy');

Route::get('/cart/increment/{id}/{qty}','ShoppingController@increment')->name('cart.increment');
Route::get('/cart/decrement/{id}/{qty}','ShoppingController@decrement')->name('cart.decrement');

Route::get('/cart/rapid/add/{id}','ShoppingController@rapidAdd')->name('rapid.add');
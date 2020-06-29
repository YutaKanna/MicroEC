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
    return view('welcome');
});

Route::get('products', 'Products\ProductsController@index')->name('products.index');
Route::get('products/{product}', 'Products\ProductsController@show')->name('products.show');

Route::get('cart/index', 'Cart\CartController@index')->name('cart.index');
Route::post('cart/add-item', 'Cart\CartController@addItem')->name('cart.add_item');
Route::post('cart/remove-item', 'Cart\CartController@removeItem')->name('cart.remove_item');
Route::post('cart/update-quantity', 'Cart\CartController@updateItemQuantity')->name('cart.update_quantity');

Route::get('order/index', 'Order\OrderController@index')->name('order.index');
Route::post('order/index', 'Order\OrderController@store')->name('order.store');

Route::get('confirmation/index', 'ConfirmationController@index')->name('confirmation.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

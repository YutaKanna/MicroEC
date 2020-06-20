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

Route::get('/products', 'Products\ProductsController@index')->name('products.index');
Route::get('/products/{product}', 'Products\ProductsController@show')->name('products.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

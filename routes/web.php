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

Route::get('/','HomeController@index');

Route::get('index','HomeController@index');
Route::get('test','HomeController@test');
Route::get('addprodusen','HomeController@addprodusen');
Route::get('test_tabel','HomeController@test_tabel');

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
Route::get('addkonsumen','HomeController@addkonsumen');
Route::get('addkaryawan','HomeController@addkaryawan');
Route::get('test_tabel','HomeController@test_tabel');
Route::get('laporan_pembayaran','HomeController@laporan_pembayaran');
Route::get('laporan_penjualan','HomeController@laporan_penjualan');

Route::resource('users','UsersController');
Route::resource('produsen','ProdusenController');
Route::resource('konsumen','KonsumenController');
Route::resource('pengeluaran','PengeluaranController');
Route::resource('jenis','JenisController');
Route::resource('jenis_operasional','JenisOperasionalController');
Route::resource('pembayaran','PembayaranController');

/* Transaksi pembelian dan penjualan */
Route::get('transaksi/pembelian','TransaksiController@getPembelian');
Route::post('transaksi/pembelian','TransaksiController@postPembelian');
Route::get('transaksi/penjualan','TransaksiController@getPenjualan');
Route::post('transaksi/penjualan','TransaksiController@postPenjualan');

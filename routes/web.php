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

Route::group(['middleware' => 'guest'], function () {
    Route::get('login','AuthController@showLoginForm');
    Route::post('login','AuthController@login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/','HomeController@index');
    Route::get('index','HomeController@index');

    Route::get('logout','AuthController@logout');

    /* Crud */
    Route::resource('users','UsersController');
    Route::resource('produsen','ProdusenController');
    Route::resource('konsumen','KonsumenController');
    Route::resource('jenis','JenisController');
    Route::get('jenis/{jenis}/konsumen/{konsumen}','JenisController@getKonsumen');
    Route::put('jenis/{jenis}/konsumen/{konsumen}','JenisController@postKonsumen');
    Route::resource('jenis_operasional','JenisOperasionalController');

    /* Transaksi pembelian dan penjualan, serta pengeluaran dan pembayaran */
    Route::get('transaksi/pembelian','TransaksiController@getPembelian');
    Route::post('transaksi/pembelian','TransaksiController@postPembelian');
    Route::get('transaksi/penjualan','TransaksiController@getPenjualan');
    Route::get('transaksi/penjualan/{konsumen}','TransaksiController@getPenjualan');
    Route::post('transaksi/penjualan','TransaksiController@postPenjualan');
    
    Route::resource('transaksi/pengeluaran','PengeluaranController');
    // Route::resource('transaksi/pembayaran','PembayaranController');
    Route::get('transaksi/pembayaran','PembayaranController@index');
    Route::get('transaksi/pembayaran/create/{konsumen}','PembayaranController@create');
    Route::post('transaksi/pembayaran','PembayaranController@store');

    /* Laporan dll */
    Route::get('laporan/penjualan','LaporanTransaksiController@indexPenjualan');
    Route::get('laporan/penjualan/{id}','LaporanTransaksiController@showPenjualan');
    Route::get('laporan/penjualan/excel/{id}','LaporanTransaksiController@excelPenjualan');
    Route::get('laporan/pembelian','LaporanTransaksiController@indexPembelian');
    Route::get('laporan/pembelian/{id}','LaporanTransaksiController@showPembelian');
    Route::resource('laporan/inventory','InventoryController');

    /* Laporan grafik */
    Route::get('grafik/keuntungan_bersih','GrafikController@keuntunganBersih');
    Route::get('grafik/modal_aktual','GrafikController@modalAktual');
    Route::get('grafik/fresh_money','GrafikController@freshMoney');
    Route::get('grafik/penjualan_bulanan','GrafikController@penjualanBulanan');
    Route::get('grafik/komposisi_penjualan','GrafikController@komposisiPenjualan');
    Route::get('grafik/komposisi_operasional','GrafikController@komposisiOperasional');
    Route::get('grafik/komposisi_pengeluaran','GrafikController@komposisiPengeluaran');
    Route::get('grafik/pemasukan_pengeluaran','GrafikController@pemasukanPengeluaran');
    Route::get('grafik/modal_penjualan','GrafikController@modalPenjualan');
});

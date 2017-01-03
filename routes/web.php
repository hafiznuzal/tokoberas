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
    Route::get('logout','AuthController@logout');

    Route::get('index','HomeController@index');

    Route::get('laporan_pembayaran','HomeController@laporan_pembayaran');
    Route::get('laporan_penjualan','LaporanTransaksiController@indexPenjualan');
    Route::get('laporan_penjualan/{id}','LaporanTransaksiController@showPenjualan');
    Route::get('laporan_pembelian','LaporanTransaksiController@indexPembelian');
    Route::get('laporan_pembelian/{id}','LaporanTransaksiController@showPembelian');

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

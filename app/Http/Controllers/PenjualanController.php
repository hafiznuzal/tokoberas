<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Inventory;
use App\ItemTransaksi;
use App\Jenis;
use App\JenisOperasional;
use App\KursBarang;
use App\Nota;
use App\Pembayaran;
use App\RiwayatOperasional;


class PenjualanController extends Controller
{
    public function index()
    {
        return view('app.transaksi_penjualan');
    }
}

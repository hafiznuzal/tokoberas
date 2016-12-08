<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Inventory;
use App\ItemTransaksi;
use App\JenisOperasional;
use App\Nota;
use App\Pembayaran;
use App\RiwayatOperasional;


class PembelianController extends Controller
{
    public function index()
    {
        // $inventory = Inventory::available()->with('jenis.kurs')->get();
        // $operasional = JenisOperasional::get();

        return view('app.transaksi_pembelian');
    }
}

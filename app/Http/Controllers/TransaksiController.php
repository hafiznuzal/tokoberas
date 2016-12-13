<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Inventory;
use App\ItemTransaksi;
use App\Jenis;
use App\JenisOperasional;
use App\Modal;
use App\Nota;
use App\Pembayaran;
use App\RiwayatOperasional;


class TransaksiController extends Controller
{
    public function getPembelian()
    {
        $data['jenis'] = Jenis::get();

        return view('app.transaksi_pembelian', $data);
    }

    public function postPembelian(Request $request)
    {
        $modal = new Modal;
        $modal->tanggal = date('Y-m-d');
        $modal->produsen_id = 0;
        $modal->biaya = $request->input('total');
        $modal->save();

        foreach ($request->input('pembelian') as $pembelian) {
            $inventory = new Inventory;
            $inventory->jenis_id = $pembelian['jenis_id'];
            $inventory->merek = $pembelian['merek'];
            $inventory->tanggal_masuk = date('Y-m-d');
            $inventory->tanggal_kadaluarsa = $pembelian['tanggal_kadaluarsa'];
            $inventory->harga_beli = $pembelian['harga'] / $pembelian['jumlah'];
            $inventory->jumlah = $pembelian['jumlah'];
            $inventory->jumlah_aktual = $pembelian['jumlah'];
            $inventory->modal_id = $modal->id;
            $inventory->save();
        }
        return redirect()->back();
    }

    public function getPenjualan()
    {
        $inventory = Inventory::available()->with('jenis')->get();
        $operasional = JenisOperasional::get();
        $dotinvent = $inventory->map(function ($item) {
            return array_dot($item->toArray());
        });

        $data = compact('operasional', 'dotinvent');
        // dd($data);
        return view('app.transaksi_penjualan', $data);
    }

    public function postPenjualan(Request $request)
    {
        dd($request->input());
    }
}

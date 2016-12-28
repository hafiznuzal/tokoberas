<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Nota;

class GrafikController extends Controller
{
    public function keuntunganBersih()
    {
        $nota = Nota::get();
        $notal = $nota->map(function ($item) {
            $item->tanggal = date('j M Y', strtotime($item->tanggal));
            return $item;
        })
        ->groupBy('tanggal')
        ->transform(function ($item) {
            return [
                'keuntungan_bersih' => $item->sum('keuntungan_bersih'),
            ];
        });

        $keuntungan_bersih = $notal->pluck('keuntungan_bersih');
        $tanggal = $notal->keys();

        $data = compact('keuntungan_bersih', 'tanggal');
        return view('app.grafik.keuntungan_bersih', $data);
    }

    public function modalAktual()
    {
        $nota = Nota::get();
        $notal = $nota->map(function ($item) {
            $item->tanggal = date('j M Y', strtotime($item->tanggal));
            return $item;
        })
        ->groupBy('tanggal')
        ->transform(function ($item) {
            return [
                'modal_bersih' => $item->sum('total_modal'),
                'modal_aktual' => $item->sum('total_pembayaran'),
            ];
        });

        $modal_bersih = $notal->pluck('modal_bersih');
        $modal_aktual = $notal->pluck('modal_aktual');
        $tanggal = $notal->keys();

        $data = compact('modal_bersih', 'modal_aktual', 'tanggal');
        return view('app.grafik.modal_aktual', $data);
    }

    public function freshMoney()
    {
        $inventory = Inventory::get();
        $invent = $inventory->map(function ($item) {
            $item->tanggal = date('j M Y', strtotime($item->tanggal_masuk));
            return $item;
        })
        ->groupBy('tanggal')
        ->transform(function ($item) {
            $item->transform(function ($inv) {
                $sisa = $inv->jumlah_aktual * $inv->harga_beli;
                $jual = ($inv->jumlah - $inv->jumlah_aktual) * $inv->harga_beli;
                return compact('sisa', 'jual');
            });
            return [
                'sisa' => $item->sum('sisa'),
                'jual' => $item->sum('jual'),
            ];
        });
        $sisa = $invent->sum('sisa');
        $jual = $invent->sum('jual');
        $tanggal = $invent->keys();

        $data = compact('sisa', 'jual', 'tanggal');
        // dd($data);
        return view('app.grafik.fresh_money', $data);
    }

    public function penjualanBulanan()
    {
        $nota = Nota::get();
        $notal = $nota->map(function ($item) {
            $item->tanggal = date('j M Y', strtotime($item->tanggal));
            return $item;
        })
        ->groupBy('tanggal')
        ->transform(function ($item) {
            return [
                'total_harga' => $item->sum('total_harga'),
            ];
        });

        $total_harga = $notal->pluck('total_harga');
        $tanggal = $notal->keys();
        
        $data = compact('nota', 'total_harga', 'tanggal');
        return view('app.grafik.penjualan_bulanan', $data);
    }

}

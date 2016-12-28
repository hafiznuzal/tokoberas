<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Jenis;
use App\JenisOperasional;
use App\Nota;
use App\Pembayaran;
use App\PengeluaranLainnya;
use App\RiwayatOperasional;

class GrafikController extends Controller
{
    public function keuntunganBersih(Request $request)
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

    public function modalAktual(Request $request)
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

    public function freshMoney(Request $request)
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

    public function penjualanBulanan(Request $request)
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

    public function komposisiPenjualan(Request $request)
    {
        $nota = Nota::get();
        $item = collect();
        $nota->each(function ($not) use(&$item) {
            $item = $item->merge($not->item_transaksi);
        });
        $byJenis = $item->groupBy('inventory_jenis')
        ->transform(function ($item, $key) { // item transaksi
            $jenis = Jenis::find($key);
            $jumlah = $item->sum('jumlah');
            return [
                'jenis' => $jenis->nama,
                'jumlah' => $jumlah
            ];
        })->values();
        // dd($byJenis);

        $jenis = $byJenis->pluck('jenis');
        $jumlah = $byJenis->pluck('jumlah');

        $data = compact('jenis', 'jumlah');
        dd($data);
        return view('app.grafik.komposisi_penjualan', $data);
    }

    public function komposisiOperasional(Request $request)
    {
        $operasional = RiwayatOperasional::get()
        ->groupBy('jenis_operasional_id')
        ->transform(function ($item, $key) {
            $jenis = JenisOperasional::find($key);
            $jumlah = $item->sum('biaya');
            return [
                'jenis' => $jenis->nama,
                'jumlah' => $jumlah
            ];
        })->values();
        // dd($operasional);

        $jenis = $operasional->pluck('jenis');
        $jumlah = $operasional->pluck('jumlah');

        $data = compact('jenis', 'jumlah');
        dd($data);
        return view('app.grafik.komposisi_operasional', $data);
    }

    public function komposisiPengeluaran(Request $request)
    {
        $operasional = PengeluaranLainnya::get()
        ->groupBy('jenis_operasional_id')
        ->transform(function ($item, $key) {
            $jenis = JenisOperasional::find($key);
            $jumlah = $item->sum('biaya');
            return [
                'jenis' => $jenis->nama,
                'jumlah' => $jumlah
            ];
        })->values();
        // dd($operasional);

        $jenis = $operasional->pluck('jenis');
        $jumlah = $operasional->pluck('jumlah');

        $data = compact('jenis', 'jumlah');
        dd($data);
        return view('app.grafik.komposisi_pengeluaran', $data);
    }

    public function pemasukanPengeluaran()
    {
        $pengeluaran = 0;
        $pemasukan = 0;

        $pengeluaran += RiwayatOperasional::get()->sum('biaya');
        $pengeluaran += PengeluaranLainnya::get()->sum('biaya');
        $pengeluaran += Inventory::get()->sum('harga_beli');

        $pemasukan += Pembayaran::get()->sum('biaya');
        $data = compact('pengeluaran', 'pemasukan');
        dd($data);
        return view('app.grafik.pemasukan_pengeluaran', $data);
    }

}

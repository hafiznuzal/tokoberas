<?php

namespace App\Providers;

use App\Nota;
use App\Jenis;
use App\Modal;
use App\Konsumen;
use App\Inventory;
use App\Pembayaran;
use App\ItemTransaksi;
use App\RiwayatOperasional;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // setiap ada jenis baru, konsumen harus diassign juga semua jenis dan harga.
        Jenis::created(function ($jenis) {
            foreach (Konsumen::select('id')->get() as $konsumen) {
                $jenis->konsumen()->attach($konsumen->id, ['harga' => $jenis->harga]);
            }
        });

        // setiap ada konsumen baru, harus diassign juga semua jenis dan harga
        Konsumen::created(function ($konsumen) {
            foreach (Jenis::select(['id', 'harga'])->get() as $jenis) {
                $jenis->konsumen()->attach($konsumen->id, ['harga' => $jenis->harga]);
            }
        });

        // cascading delete flow
        Modal::deleting(function ($modal) {
            foreach ($modal->inventory as $inventory) {
                $inventory->delete();
            }
        });

        Inventory::deleting(function ($inventory) {
            foreach ($inventory->transaksi as $transaksi) {
                $transaksi->nota->delete();
            }
        });

        Nota::deleting(function ($nota) {
            foreach ($nota->item_transaksi as $transaksi) {
                $transaksi->delete();
            }
            foreach ($nota->pembayaran as $pembayaran) {
                $pembayaran->delete();
            }
            foreach ($nota->operasional as $operasional) {
                $operasional->delete();
            }
        });

        ItemTransaksi::deleting(function ($transaksi) {
            $transaksi->inventory->jumlah_aktual += $transaksi->jumlah;
            $transaksi->inventory->save();

            $transaksi->nota->total_modal -= $transaksi->inventory->harga_beli * $transaksi->jumlah;
            $transaksi->nota->keuntungan_bersih += $transaksi->inventory->harga_beli * $transaksi->jumlah;
            $transaksi->nota->save();
        });

        RiwayatOperasional::deleting(function ($operasional) {
            $operasional->nota->keuntungan_bersih += $operasional->biaya;
            $operasional->nota->save();
        });

        Pembayaran::deleting(function ($pembayaran) {
            // $pembayaran->nota
            $pembayaran->nota->total_pembayaran -= $pembayaran->biaya;
            if ($pembayaran->nota->total_pembayaran < $pembayaran->nota->total_harga) {
                $pembayaran->nota->status = 0;
            }
            $pembayaran->nota->save();
        });
    }
}

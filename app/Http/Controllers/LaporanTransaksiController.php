<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Inventory;
use App\ItemTransaksi;
use App\Jenis;
use App\JenisOperasional;
use App\Konsumen;
use App\Modal;
use App\Nota;
use App\Pembayaran;
use App\Produsen;
use App\RiwayatOperasional;
use Excel;

class LaporanTransaksiController extends Controller
{
    /**
     * List transaksi pembelian.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPembelian()
    {
        $modal = Modal::get();

        $data = compact('modal');
        return view('app.laporan_pembelian_list', $data);
    }

    /**
     * Detail transaksi pembelian.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPembelian($id)
    {
        $modal = Modal::find($id);

        $data = compact('modal');
        return view('app.laporan_pembelian_show', $data);
    }

    /**
     * List transaksi penjualan.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPenjualan()
    {
        $nota = Nota::get();

        $data = compact('nota');
        return view('app.laporan_penjualan_list', $data);
    }

    /**
     * Detail transaksi penjualan.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPenjualan($id)
    {
        $nota = Nota::find($id);
        $nota->tanggal = date('Y-m-d', strtotime($nota->tanggal));

        $data = compact('nota');
        return view('app.laporan_penjualan_show', $data);
    }

    /**
     * Ngeluarin kuitansi penjualan dalam excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function excelPenjualan($id)
    {
        $nota = Nota::find($id);
        Excel::create('Filename', function($excel) use($nota) {
            $excel->sheet('Sheetname', function($sheet) use($nota) {
                $items = $nota->item_transaksi
                    ->map(function($item, $key) {
                        $item->nama = $item->jenis->nama;
                        $item->no = $key + 1;
                        return collect($item->toArray())
                            ->only(['no', 'nama', 'biaya'])
                            ->reverse();
                    });
                // dd($items);
                $sheet->fromArray($items, null, 'A3');
            });
        })->export('xls');
    }

}

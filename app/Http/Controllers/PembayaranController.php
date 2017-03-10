<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konsumen;
use App\Nota;
use App\Pembayaran;
use App\User;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        if ($start == null && $end == null) {
            $pembayaran = Pembayaran::get();
            $start = $end = date('Y-m-d');
        } else {
            $pembayaran = Pembayaran::where('tanggal', '>=', $start)
                    ->where('tanggal', '<=', $end)
                    ->get();
        }

        $nota = Nota::with('konsumen')->get();
        $konsumen = Konsumen::get();
        $konsumen->transform(function ($item) {
            $total_harga = ($item->nota()->sum('total_harga'));
            $total_pembayaran = ($item->nota()->sum('total_pembayaran'));
            $item->total_hutang = $total_harga - $total_pembayaran;
            return $item;
        });
        $data = compact('pembayaran', 'nota', 'konsumen', 'start', 'end');
        // dd($data);
        return view('app.laporan.pembayaran.index', $data);
    }

    public function createKonsumen($konsumen_id)
    {
        $nota = Nota::with('konsumen')
            ->where('konsumen_id', $konsumen_id)
            ->whereRaw('total_harga > total_pembayaran')
            ->get();
        $dotnota = $nota->map(function ($item) {
            return array_dot($item->toArray());
        });
        $users = User::get();
        $data = compact('nota', 'dotnota', 'users');
        return view('app.laporan.pembayaran.create', $data);
    }

    public function createNota($nota_id)
    {
        $nota = Nota::with('konsumen')
            ->where('id', $nota_id)
            ->whereRaw('total_harga > total_pembayaran')
            ->get();
        $dotnota = $nota->map(function ($item) {
            return array_dot($item->toArray());
        });
        $users = User::get();
        $data = compact('nota', 'dotnota', 'users');
        return view('app.laporan.pembayaran.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembayaran = new Pembayaran;
        $pembayaran->nota_id = $request->input('nota_id');
        $nota = $pembayaran->nota;
        $pembayaran->nota_konsumen_id = $nota->konsumen_id; // ini ndang dihapus
        $pembayaran->biaya = str_replace(',', '', $request->input('biaya'));
        $pembayaran->tanggal = $request->input('tanggal');
        $pembayaran->user_id = $request->input('user_id');

        /* update nota nya */
        $nota->total_pembayaran += $pembayaran->biaya;
        if ($nota->total_pembayaran > $nota->total_harga) {
            $nota->status = 1;
        }
        $nota->save();
        $pembayaran->save();

        return redirect('transaksi/pembayaran')->with('tambah_success', true);
    }
}

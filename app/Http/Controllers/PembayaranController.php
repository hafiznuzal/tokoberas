<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Nota;
use App\User;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $user = User::get();
        $dotnota = $nota->map(function ($item) {
            return array_dot($item->toArray());
        });
        $data = compact('pembayaran', 'nota', 'user', 'dotnota', 'start', 'end');
        // dd($data);
        return view('app.laporan_pembayaran_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return redirect()->back()->with('tambah_success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengeluaranLainnya;
use App\User;
use App\JenisOperasional;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pengeluaran'] = PengeluaranLainnya::get();
        $data['jenis'] = JenisOperasional::get();
        $data['user'] = User::get();
        return view('app.laporan_pengeluaran', $data);
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
        // dd($request->input());
        $pengeluaran = new PengeluaranLainnya;
        $pengeluaran->jenis_operasional_id = $request->input('jenis');
        $pengeluaran->uraian = $request->input('uraian');
        $pengeluaran->tanggal = $request->input('tanggal');
        $pengeluaran->biaya = str_replace(',', '', $request->input('biaya'));
        $pengeluaran->user_id= $request->input('user_id');
        $pengeluaran->save();

        return redirect()->back();
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
        $pengeluaran = PengeluaranLainnya::find($id);
        $pengeluaran->tanggal = date('Y-m-d', strtotime($pengeluaran->tanggal));
        $jenis = JenisOperasional::get();
        $user = User::get();

        $data = compact('pengeluaran', 'jenis', 'user');
        return view('app.editpengeluaran', $data);
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
        $pengeluaran = PengeluaranLainnya::find($id);
        $pengeluaran->jenis_operasional_id = $request->input('jenis');
        $pengeluaran->uraian = $request->input('uraian');
        $pengeluaran->tanggal = $request->input('tanggal');
        $pengeluaran->biaya = str_replace(',', '', $request->input('biaya'));
        $pengeluaran->user_id= $request->input('user_id');
        $pengeluaran->save();

        return redirect()->back();
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

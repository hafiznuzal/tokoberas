<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use App\KursBarang as Kurs;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jenis'] = Jenis::get();

        return view('app.jenis_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis = new Jenis;
        $jenis->nama = $request->input('nama');
        $jenis->latest_kurs_id = 0;
        $jenis->save();

        $kurs = new Kurs;
        $kurs->harga = $request->input('harga');
        $kurs->tanggal = date('Y-m-d H:i:s');
        $kurs->jenis_id = $jenis->id;
        $kurs->save();

        $jenis->latest_kurs_id = $kurs->id;
        $jenis->save();

        return redirect()->back();
    }

    /**
     * Nampilin kursnya barang.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kurs = Jenis::find($id)->kurs;
        dd($kurs);
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
        $jenis = Jenis::find(decrypt($id));
        $jenis->delete();
        return redirect()->back();
    }
}

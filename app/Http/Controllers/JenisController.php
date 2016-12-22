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
        $nama = $request->input('nama');
        $harga = str_replace(',', '', $request->input('harga'));
        $jenis = Jenis::createAndKurs($nama, $harga);

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
        $jenis = Jenis::find($id);
        $kurs = $jenis->kurs->sortByDesc('tanggal');

        $data = compact('jenis', 'kurs');
        return view('app.jenis_show', $data);
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
        $kurs = new Kurs;
        $kurs->harga = str_replace(',', '', $request->input('harga'));
        $kurs->tanggal = date('Y-m-d H:i:s');
        $kurs->jenis_id = $id;
        $kurs->save();

        $jenis = Jenis::find($id);
        $jenis->latest_kurs_id = $kurs->id;
        $jenis->save();

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
        $jenis = Jenis::find(decrypt($id));
        $jenis->delete();
        return redirect()->back();
    }
}

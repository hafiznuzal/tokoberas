<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konsumen;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['konsumen'] = Konsumen::get();
        return view('app.addkonsumen', $data);
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
        //
        $konsumen = new Konsumen;
        $konsumen->nama = $request->input('nama');
        $konsumen->tanggallahir = $request->input('tanggallahir');
        $konsumen->alamat = $request->input('alamat');
        $konsumen->telepon = $request->input('telepon');
        $konsumen->hp = $request->input('hp');
        $konsumen->save();
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
        //
        $data['konsumen'] = Konsumen::find($id);
        return view('app.editkonsumen', $data);
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
        $konsumen = Konsumen::find($id);
        $konsumen->nama = $request->input('nama');
        $konsumen->alamat = $request->input('alamat');
        $konsumen->telepon = $request->input('telepon');
        $konsumen->hp = $request->input('hp');
        $konsumen->save();

        return redirect('konsumen');
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
        $konsumen = Konsumen::find(decrypt($id));
        $konsumen->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produsen;

class ProdusenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['produsen'] = Produsen::get();
        return view('app.addprodusen', $data);
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
        // dd($request->input());
        $produsen = new Produsen;
        $produsen->nama = $request->input('nama');
        $produsen->alamat = $request->input('alamat');
        $produsen->telepon = $request->input('telepon');
        $produsen->hp = $request->input('hp');
        $produsen->save();

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
        $data['produsen'] = Produsen::find($id);
        return view('app.editprodusen', $data);
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
        // dd($request->input());
        $produsen = Produsen::find($id);
        $produsen->nama = $request->input('nama');
        $produsen->alamat = $request->input('alamat');
        $produsen->telepon = $request->input('telepon');
        $produsen->hp = $request->input('hp');
        $produsen->save();

        return redirect('produsen');
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
        $produsen = Produsen::find(decrypt($id));
        $produsen->delete();
        return redirect()->back();
    }
}

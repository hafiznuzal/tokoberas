<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['user'] = User::get();
        return view('app.addkaryawan',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //
        // dd($request->input());
        $users = new User;
        $users->nama = $request->input('nama');
        $users->tanggal_lahir = $request->input('tanggallahir');
        $users->alamat = $request->input('alamat');
        //$users->telepon = $request->input('telepon');
        $users->hp = $request->input('hp');
        $users->tempat_lahir = $request->input('tempatlahir');
        $users->jabatan = $request->input('jabatan');
        $users->username = $request->input('username');
        $users->password = $request->input('password');


        $users->save();

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
        $data['user'] = User::find($id);
        return view('app.editkaryawan', $data);
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
        $users = User::find($id);
        $users->nama = $request->input('nama');
        $users->tanggal_lahir = $request->input('tanggallahir');
        $users->alamat = $request->input('alamat');
        //$users->telepon = $request->input('telepon');
        $users->hp = $request->input('hp');
        $users->tempat_lahir = $request->input('tempatlahir');
        $users->jabatan = $request->input('jabatan');
        $users->username = $request->input('username');
        //$users->password = $request->input('password');
        $users->save();

        return redirect('users');
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

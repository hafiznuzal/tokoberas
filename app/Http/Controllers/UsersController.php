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
        // dd($request->input());
        $user = new User;
        $user->nama = $request->input('nama');
        $user->tanggal_lahir = $request->input('tanggallahir');
        $user->alamat = $request->input('alamat');
        //$user->telepon = $request->input('telepon');
        $user->hp = $request->input('hp');
        $user->tempat_lahir = $request->input('tempatlahir');
        $user->jabatan = $request->input('jabatan');
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));

        $user->save();

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
        $user = User::find($id);
        $user->nama = $request->input('nama');
        $user->tanggal_lahir = $request->input('tanggallahir');
        $user->alamat = $request->input('alamat');
        //$user->telepon = $request->input('telepon');
        $user->hp = $request->input('hp');
        $user->tempat_lahir = $request->input('tempatlahir');
        $user->jabatan = $request->input('jabatan');
        $user->username = $request->input('username');
        //$user->password = $request->input('password');
        $user->save();

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
        $user = User::find(decrypt($id));
        $user->delete();
        return redirect()->back();
    }
}

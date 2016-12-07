<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.example');
    }
    public function test()
    {
        return view('app.addperson');
    }
     public function addprodusen()
    {
       return view('app.addprodusen');
    } 
     public function addkonsumen()
    {
       return view('app.addkonsumen');
    } 
    public function addkaryawan()
    {
       return view('app.addkaryawan');
    } 
    public function test_tabel()
    {
        return view('app.tabel');
    }
    public function laporan_pembayaran()
    {
        return view('app.tabel_laporan_pembayaran');
    }
    public function laporan_penjualan()
    {
        return view('app.tabel_laporan_penjualan');
    }
}
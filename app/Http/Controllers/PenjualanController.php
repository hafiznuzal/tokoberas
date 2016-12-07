<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('app.transaksi_penjualan');
    }
}

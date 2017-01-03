<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $jenis = Jenis::get()
            ->transform(function ($item) {
                $item->jumlah = $item->inventory->sum('jumlah_aktual');
                return $item;
            });

        $data = compact('jenis');
        return view('app.inventory_index', $data);
    }
}

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
    public function test_tabel()
    {
        return view('tabel');
    }
}
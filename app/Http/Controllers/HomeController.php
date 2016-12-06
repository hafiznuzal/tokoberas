<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Model\Halte;
// use App\Model\Koridor;
// use App\Model\Point;
// use App\Model\Rute;
class HomeController extends Controller
{
	public function index()
    {
        return view('navbar');
    }
    public function test()
    {
        return view('addperson');
    }
}
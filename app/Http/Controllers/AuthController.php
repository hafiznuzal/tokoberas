<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        Auth::attempt($request->input());
        echo json_encode(['status' => Auth::check()]);
    }

    /**
     * Handle a login request to the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}

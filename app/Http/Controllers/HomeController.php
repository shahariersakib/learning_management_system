<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('layouts.app');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verifikasi_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('verifikasi');
    }
}

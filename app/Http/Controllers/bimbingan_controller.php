<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bimbingan_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        return view('bimbingan');
    }
}

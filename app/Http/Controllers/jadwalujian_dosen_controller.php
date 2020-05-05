<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jadwalujian_dosen_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        return view('jadwalujian_dosen');
    }
}

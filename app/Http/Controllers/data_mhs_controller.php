<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class data_mhs_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('data_mhs');
    }
}

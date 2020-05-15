<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VPrakp;
class periode_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        return view('periode');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vmjadwal;

class jadwalujian_dosen_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $Vmjadwal= Vmjadwal::all()->toArray();
        return view('jadwalujian_dosen',compact('Vmjadwal'));
    }
}

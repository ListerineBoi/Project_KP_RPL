<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VKp;

class bimbingan_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $iddos=Auth::guard('dosen')->user()->id;
        $Vkp= VKp::where('id_dosen', '=', $iddos)->get()->toArray();
        return view('bimbingan',compact('Vkp'));
    }
}

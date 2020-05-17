<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VbPrakp;
use App\periode;

class bimbinganPKP_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $period = periode::where('aktif','=','1')->value('id_periode');
        $iddos=Auth::guard('dosen')->user()->id;
        $Vbprakp= VbPrakp::where([
            ['id_dosen', '=', $iddos],
            ['id_periode', '=', $period],
            ])->get()->toArray();
        return view('bimbinganPrakp',compact('Vbprakp'));
    }
}

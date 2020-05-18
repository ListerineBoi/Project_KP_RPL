<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vmjadwal;
use App\periode;

class jadwalujian_dosen_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $period = periode::where('aktif','=','1')->value('id_periode');
        $id=Auth::guard('dosen')->user()->id;
        $Vmjadwal= Vmjadwal::where([
            ['id_periode', '=', $period],
            ['penguji', '=', $id],
            ])->get()->toArray();
        return view('jadwalujian_dosen',compact('Vmjadwal'));
    }
}

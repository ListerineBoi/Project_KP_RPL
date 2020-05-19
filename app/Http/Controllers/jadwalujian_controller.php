<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vmjadwal;

class jadwalujian_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nim=Auth::user()->NIM;
        $period=Auth::user()->id_periode;
        $Vmjadwal= Vmjadwal::where([
            ['nim', '=', $nim],
            ['id_periode', '=', $period],
        ])->get()->toArray();
        return view('jadwalujian',compact('Vmjadwal'));
    }
}

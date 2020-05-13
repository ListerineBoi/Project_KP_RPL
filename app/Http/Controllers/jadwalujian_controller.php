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
        $Vmjadwal= Vmjadwal::where('nim', '=', $nim)->get()->toArray();
        return view('jadwalujian',compact('Vmjadwal'));
    }
}

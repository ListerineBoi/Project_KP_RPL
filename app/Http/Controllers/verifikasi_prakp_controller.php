<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VPraKp;
use App\PraKp;


class verifikasi_prakp_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $VPrakp= VPraKp::where('status_prakp', '=', '0')->get()->toArray();
        return view('verifikasi_prakp', compact('VPrakp'));
    }

    public function ver(Request $request)
    {
        PraKp::where('id_prakp', $request->get('id'))->update(['status_prakp' => 1]);
        return redirect()->route('verifikasi_prakp')->with('success','Data Added');;
        
    }
}

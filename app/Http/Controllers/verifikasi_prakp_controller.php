<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VPraKp;
use App\PraKp;
use App\dosen;
use App\User;
use App\periode;


class verifikasi_prakp_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $period = periode::where('aktif','=','1')->value('id_periode'); 
        $VPrakp= VPraKp::where([
            ['status_prakp', '=', '0'],
            ['id_periode', '=', $period], 
            ])->get()->toArray();
        $dosen= dosen::all()->toArray();
        return view('verifikasi_prakp', compact('VPrakp','dosen'));
    }

    public function ver(Request $request)
    {
        $dos=$request->get('Pembimbing');
        PraKp::where('id_prakp', $request->get('id'))->update(['status_prakp' => 1]);
        User::where('NIM', $request->get('nim'))->update(['id_dosen' => $dos]);
        return redirect()->route('verifikasi_prakp')->with('success','Data Added');
    }
    public function tolak(Request $request)
    {
        PraKp::where('id_prakp', $request->get('id'))->update(['status_prakp' => 2]);
        User::where('NIM', $request->get('nim'))->update(['id_dosen' => null]);
        return redirect()->route('verifikasi_prakp')->with('success','Data Added');
    }
}

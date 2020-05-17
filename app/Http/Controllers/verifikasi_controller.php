<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VKp;
use App\Kp;
use App\dosen;
use App\User;
use App\periode;

class verifikasi_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $period = periode::where('aktif','=','1')->value('id_periode'); 
        $Vkp= VKp::where([
            ['status_kp', '=', '0'],
            ['id_periode', '=', $period],
            ])->get()->toArray(); 
        $dosen= dosen::all()->toArray();
        return view('verifikasi',compact('Vkp','dosen'));
    }

    public function ver(Request $request)
    {
        $dos=$request->get('Pembimbing');
        Kp::where('id_kp', $request->get('id'))->update(['status_kp' => 1]);
        User::where('NIM', $request->get('nim'))->update(['id_dosen' => $dos]);
        return redirect()->route('verifikasi')->with('success','Data Added');
    }

    public function tolak(Request $request)
    {
        Kp::where('id_kp', $request->get('id'))->update(['status_kp' => 2]);
        User::where('NIM', $request->get('nim'))->update(['id_dosen' => null]);
        return redirect()->route('verifikasi')->with('success','Data Added');
    }
}

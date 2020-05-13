<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VKp;
use App\Kp;

class verifikasi_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $Vkp= VKp::where('status_kp', '=', '0')->get()->toArray();
        return view('verifikasi',compact('Vkp'));
    }

    public function ver(Request $request)
    {
        Kp::where('id_kp', $request->get('id'))->update(['status_kp' => 1]);
        return redirect()->route('verifikasi')->with('success','Data Added');;
        
    }
}

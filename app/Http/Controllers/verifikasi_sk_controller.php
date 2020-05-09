<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sk;

class verifikasi_sk_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $sk= Sk::where('status_sk', '=', '0')->get()->toArray();
        return view('verifikasi_sk', compact('sk'));
    }

    public function ver(Request $request)
    {
        Sk::where('id_sk', $request->get('id'))->update(['status_sk' => 1]);
        return redirect()->route('verifikasi_sk')->with('success','Data Added');;
        
    }
}

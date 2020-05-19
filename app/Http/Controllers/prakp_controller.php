<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VPraKp;
use App\PraKp;
use App\Kp;

class prakp_controller extends Controller
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
        $VPrakp= VPraKp::where([
            ['nim', '=', $nim],
            ['id_periode', '=', $period],
        ])->get()->toArray();
        return view('prakp',compact('VPrakp'));
    }
    public function create(Request $request)
    {
        $nim=Auth::user()->NIM;
        $period=Auth::user()->id_periode;
        $forbid = Kp::where([
            ['nim', '=', $nim],
            ['status_kp', '=', '1'], 
            ['id_periode', '=', $period],
        ])->value('id_kp');
        $period=Auth::user()->id_periode;
        $this->validate($request, [
            'Judul' => 'required',
            'Tools' => 'required',
            'Spek' => 'required'      
        ]);
        if($forbid)
        {
            return redirect()->route('prakp')->with('Forbidden','Anda Sudah Mendaftar KP!');
        }
        else
        {
        $PraKp= new PraKp([
            'nim' => Auth::user()->NIM,
            'tool' => $request->get('Tools'),
            'spek' => $request->get('Spek'),
            'status_prakp' => "0",
            'id_periode' => $period,
            'judul' => $request->get('Judul')
        ]);
        $PraKp->save();
        return redirect()->route('prakp')->with('success','Data Added');
        }
    }
}

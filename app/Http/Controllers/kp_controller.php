<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VKp;
use App\Kp;
use App\PraKp;

class kp_controller extends Controller
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
        $Vkp= VKp::where([
            ['nim', '=', $nim],
            ['id_periode', '=', $period],
        ])->get()->toArray();
        return view('kp',compact('Vkp'));
    }

    public function create(Request $request)
    {
        $nim=Auth::user()->NIM;
        $period=Auth::user()->id_periode;
        $forbid = PraKp::where([
            ['nim', '=', $nim],
            ['status_prakp', '=', '1'], 
            ['id_periode', '=', $period],
        ])->value('id_prakp');
        $this->validate($request, [
            'Judul' => 'required',
            'Tools' => 'required',
            'Spek' => 'required'      
        ]);
        if($forbid)
        {
            return redirect()->route('kp')->with('Forbidden','Anda Sudah Mendaftar Pra-KP!');
        }
        else
        {
        $Kp= new Kp([
            'nim' => Auth::user()->NIM,
            'tool' => $request->get('Tools'),
            'status_kp' => "0",
            'id_periode' => $period,
            'spek' => $request->get('Spek'),
            'judul' => $request->get('Judul')
        ]);
        $Kp->save();
        return redirect()->route('kp')->with('success','Data Added');
        }
    }
}

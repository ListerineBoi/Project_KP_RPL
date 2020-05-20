<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VPraKp;
use App\PraKp;
use App\Kp;
use App\Sk;

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

        $forbid2 = PraKp::where([
            ['nim', '=', $nim],
            ['status_prakp', '=', '1'], 
            ['id_periode', '=', $period],
        ])->value('id_prakp');


        $period=Auth::user()->id_periode;
        $this->validate($request, [
            'Judul' => 'required',
            'Tools' => 'required',
            'Spek' => 'required',
            'Lembaga' => 'required',
            'Pimpinan' => 'required',
            'Telp' => 'required',
            'Alamat' => 'required',
            'Fax' => 'required',
            'doc' => 'required'     
        ]);
       
        if($forbid == true || $forbid2 == true) 
        {
            return redirect()->route('prakp')->with('Forbidden','Anda Sudah Mendaftar KP/Sudah ada praKp yang terverifikasi');
        }
        else
        {
            $fullname = $request->file('doc')->getClientOriginalName();
            $nim=Auth::user()->NIM;
            $extn =$request->file('doc')->getClientOriginalExtension();
            $final= $nim.'PraKp'.'_'.time().'.'.$extn;

            $path = $request->file('doc')->storeAs('public/PraKp', $final);

        $PraKp= new PraKp([
            'nim' => Auth::user()->NIM,
            'tool' => $request->get('Tools'),
            'spek' => $request->get('Spek'),
            'status_prakp' => "0",
            'id_periode' => $period,
            'judul' => $request->get('Judul'),
            'lembaga' => $request->get('Lembaga'),
            'pimpinan' => $request->get('Pimpinan'),
            'no_telp' => $request->get('Telp'),
            'alamat' => $request->get('Alamat'), 
            'dokumen' => $final,
            'fax' => $request->get('Fax')
        ]);
        $PraKp->save();
        return redirect()->route('prakp')->with('success','Data Added');
        }
    }
}

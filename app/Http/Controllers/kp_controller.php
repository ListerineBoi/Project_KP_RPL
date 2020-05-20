<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VKp;
use App\Kp;
use App\PraKp;
use App\Sk;

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

        $forbid2 = Kp::where([
            ['nim', '=', $nim],
            ['status_kp', '=', '1'], 
            ['id_periode', '=', $period],
        ])->value('id_kp');


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
            return redirect()->route('kp')->with('Forbidden','Anda Sudah Mendaftar Pra-KP di periode ini!/Sudah Ada KP yang terverifikasi di periode ini');
        }
        else
        {
            $fullname = $request->file('doc')->getClientOriginalName();
            $nim=Auth::user()->NIM;
            $extn =$request->file('doc')->getClientOriginalExtension();
            $final= $nim.'Kp'.'_'.time().'.'.$extn;

            $path = $request->file('doc')->storeAs('public/Kp', $final);

        $Kp= new Kp([
            'nim' => Auth::user()->NIM,
            'tool' => $request->get('Tools'),
            'status_kp' => "0",
            'id_periode' => $period,
            'spek' => $request->get('Spek'),
            'judul' => $request->get('Judul'),
            'lembaga' => $request->get('Lembaga'),
            'pimpinan' => $request->get('Pimpinan'),
            'no_telp' => $request->get('Telp'),
            'alamat' => $request->get('Alamat'), 
            'dokumen' => $final,
            'fax' => $request->get('Fax') 
        ]);
        $Kp->save();
        return redirect()->route('kp')->with('success','Data Added');
        }
    }
}

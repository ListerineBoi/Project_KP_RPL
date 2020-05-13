<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VKp;
use App\dosen;
use App\Kp;
use App\jadwalujian;

class penjadwalanujian_controller extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $Vkp= VKp::where('id_jdl_uji', '=', null)->get()->toArray();
        $dosen= dosen::all()->toArray();

        return view('penjadwalanujian',compact('Vkp','dosen'));
    }

    public function create(Request $request)
    {
        
        $this->validate($request, [
            'Tanggal' => 'required',
            'Ruangan' => 'required',
            'Jam' => 'required',
            'Penguji' => 'required'  

        ]);
        $jadwalujian=new jadwalujian([
            'nim' => $request->get('nim'),
            'tanggal' => $request->get('Tanggal'),
            'ruang' => $request->get('Ruangan'),
            'jam' => $request->get('Jam'),
            'id_dosen' => $request->get('Penguji'),
        ]);
        $jadwalujian->save();

        $jwdid=jadwalujian::where('nim', '=', $request->get('nim'))->value('id_jdl_uji');
        Kp::where('id_kp', $request->get('id'))->update(['id_jdl_uji' => $jwdid]);
        return redirect()->route('penjadwalanujian');
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\periode;
class periode_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $per= periode::all()->toArray();
        return view('periode',compact('per')); 
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'semester' => 'required',
            'Tahun' => 'required'      
        ]);

        periode::where('aktif', 1)->update(['aktif' => 0]);
        $periode= new periode([
            'semester' => $request->get('semester'),
            'aktif' => 1,
            'tahun' => $request->get('Tahun')
        ]);
        $periode->save();
        return redirect()->route('periode')->with('success','Data Added');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VPraKp;
use App\PraKp;

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
        $VPrakp= VPraKp::where([
            ['nim', '=', $nim],
            ['status_prakp', '=', '1'],
        ])->get()->toArray();
        return view('prakp',compact('VPrakp'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'Judul' => 'required',
            'Tools' => 'required',
            'Spek' => 'required'      
        ]);

        $PraKp= new PraKp([
            'nim' => Auth::user()->NIM,
            'tool' => $request->get('Tools'),
            'spek' => $request->get('Spek'),
            'status_prakp' => "0",
            'judul' => $request->get('Judul')
        ]);
        $PraKp->save();
        return redirect()->route('prakp')->with('success','Data Added');
    }
}

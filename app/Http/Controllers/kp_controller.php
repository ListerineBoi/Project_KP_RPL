<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VKp;
use App\Kp;

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
        $Vkp= Vkp::where([
            ['nim', '=', $nim],
            ['status_kp', '=', '1'],
        ])->get()->toArray();
        return view('kp',compact('Vkp'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'Judul' => 'required',
            'Tools' => 'required',
            'Spek' => 'required'      
        ]);

        $Kp= new Kp([
            'nim' => Auth::user()->NIM,
            'tool' => $request->get('Tools'),
            'spek' => $request->get('Spek'),
            'judul' => $request->get('Judul')
        ]);
        $Kp->save();
        return redirect()->route('kp')->with('success','Data Added');
    }
}

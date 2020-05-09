<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sk;
use Auth;

class pgjnController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nim=Auth::user()->NIM;
        $sk= Sk::where([
            ['nim', '=', $nim],
            ['status_sk', '=', '1'],
        ])->get()->toArray();
        return view('sk', compact('sk'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'Lembaga' => 'required',
            'Pimpinan' => 'required',
            'Telp' => 'required',
            'Alamat' => 'required',
            'Fax' => 'required'      

        ]);

        $Sk= new Sk([
            'nim' => Auth::user()->NIM,
            'lembaga' => $request->get('Lembaga'),
            'pimpinan' => $request->get('Pimpinan'),
            'no_telp' => $request->get('Telp'),
            'alamat' => $request->get('Alamat'),
            'fax' => $request->get('Fax')
        ]);
        $Sk->save();
        return redirect()->route('sk')->with('success','Data Added');
    }
}

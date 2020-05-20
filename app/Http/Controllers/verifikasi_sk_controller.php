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
        // $sk= Sk::where('status_sk', '=', '0')->get()->toArray();
        $sk= Sk::all()->toArray();
        return view('verifikasi_sk', compact('sk'));
    }

    public function ver(Request $request)
    {
        $this->validate($request, [
            'doc' => 'required'      
        ]);
        $fullname = $request->file('doc')->getClientOriginalName();
            $id=$request->get('id');
            $extn =$request->file('doc')->getClientOriginalExtension();
            $final= $id.'Skdoc'.'_'.time().'.'.$extn;

            $path = $request->file('doc')->storeAs('public/Skdoc', $final);

        $update= [
            'status_sk' => 1,
            'doc_sk' => $final
        ];
        Sk::where('id_sk', $request->get('id'))->update($update);
        return redirect()->route('verifikasi_sk')->with('success','Data Added');
        
    }

    public function tolak(Request $request)
    {
        Sk::where('id_sk', $request->get('id'))->update(['status_sk' => 2]);
        return redirect()->route('verifikasi_sk')->with('success','Data Added');
    }
}

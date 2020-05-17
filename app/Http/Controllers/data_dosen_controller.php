<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosen;

class data_dosen_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        return view('data_dosen');
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'status' => 'required'      
        ]);
        $update= [
            'nik' => $request->get('nik'),
            'koor' => $request->get('status')
        ];
        dosen::where('id', $request->get('id'))->update($update);
        return redirect()->to('/homeD'); 
    }
}

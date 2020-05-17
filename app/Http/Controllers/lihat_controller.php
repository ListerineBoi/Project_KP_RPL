<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lihat_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index(Request $request)
    {
        $doc=$request->get('id');
        return view('lihat',compact('doc'));
    }
}

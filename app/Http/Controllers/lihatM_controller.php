<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lihatM_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $doc=$request->get('id');
        return view('lihatM',compact('doc'));
    }
}

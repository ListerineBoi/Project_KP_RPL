<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeDController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::guard('dosen')->user()->nik==null)
        {
            return redirect()->to('/data_dosen');
        }
        else
        {

            return view('homeD');
        }
    }
}

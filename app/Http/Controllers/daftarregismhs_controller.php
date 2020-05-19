<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vbkp;
class daftarregismhs_controller extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $Vkp= Vbkp::where('status_kp', '=', '1')->get()->toArray();
        return view('daftarregismhs', compact('Vkp'));
    }
}

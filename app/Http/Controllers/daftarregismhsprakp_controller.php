<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VbPrakp;
class daftarregismhsprakp_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }

    public function index()
    {
        $Vprakp= VbPrakp::where('status_prakp', '=', '1')->get()->toArray();
        return view('daftarregismhsprakp',compact('Vprakp'));
    }
}

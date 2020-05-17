<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\periode;
use App\User;

class data_mhs_controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('data_mhs');
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'Nim' => 'required'      
        ]);
        $per=periode::where('aktif', '=', 1)->value('id_periode');
        $update= [
            'NIM' => $request->get('Nim'),
            'id_periode' => $per
        ];
        User::where('id', $request->get('id'))->update($update); 
        return redirect()->to('/home');
    }
}

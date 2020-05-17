<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\dosen;
use Socialite;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;

class SocialAuthGoogleController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $existUser = User::Where('email',$googleUser->email)->first();
            $existDosen = dosen::Where('email',$googleUser->email)->first();

            if($existUser)
            {
                Auth::login($existUser);
                if(Auth::user()->NIM==null)
                {
                    return redirect()->to('/data_mhs');
                }
                else
                {
                    return redirect()->to('/home');
                }
            }
            elseif($existDosen)
            {
                Auth::guard('dosen')->loginUsingId($existDosen->id, true);
                if(Auth::guard('dosen')->user()->nik==null)
                {
                    return redirect()->to('/data_dosen');
                }
                else
                {
                    return redirect()->to('/homeD');
                }
                
            }
            else
            {
                if(Str::endsWith($googleUser->email, "@gmail.com"))
                {
                    $user = new user;
                    $user->name = $googleUser->name;
                    $user->email = $googleUser->email;
                    $user->google_id = $googleUser->id;
                    $user->save();
                    Auth::login($user);
                    return redirect()->to('/data_mhs');
                }
                elseif(Str::endsWith($googleUser->email, "@si.ukdw.ac.id"))
                {
                    $dosen = new dosen;
                    $dosen->name = $googleUser->name;
                    $dosen->email = $googleUser->email;
                    $dosen->google_id = $googleUser->id;
                    $dosen->save();
                    Auth::guard('dosen')->login($dosen);
                    return redirect()->to('/data_dosen');
                }
            }
            
        }catch (Exception $e){
            return 'err';
        }
        
    }
    public function logout(Request $request)
    {
        Auth::guard()->logout();
 
        $request->session()->flush();
 
        $request->session()->regenerate();
 
        return redirect('/');
    }

}

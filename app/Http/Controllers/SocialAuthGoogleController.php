<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\dosen;
use Socialite;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
                return redirect()->to('/home');
            }
            elseif($existDosen)
            {
                Auth::guard('dosen')->loginUsingId($existDosen->id, true);
                return redirect()->to('/homeD');
                //$existDosen->id_dosen
            }
            else
            {
                $user = new user;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->save();
                Auth::login($user);
                return redirect()->to('/home');
            }
            
        }catch (Exception $e){
            return 'err';
        }

    }

}

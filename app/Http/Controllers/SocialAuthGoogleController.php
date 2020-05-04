<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
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

            if($existUser)
            {
                Auth::loginUsingId($existUser->id, true);
            }
            else
            {
                $user = new user;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->save();
                Auth::loginUsingId($user->id, true);
            }
            return redirect()->to('/home');
        }catch (Exception $e){
            return 'err';
        }

    }

}

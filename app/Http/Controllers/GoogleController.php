<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver('google')->user();
            // dd($user);
            $finduser = User::where('googleid', $user->getId())->first();
            // dd($finduser);
            if($finduser){
                // dd($user->id);
                Auth::login($finduser);
                return redirect()->intended('/');
            }else{
                // dd($user->id);
                $newUser = User::create([
                    'name' => $user->getName(),
                    'username' => $user->getNickname(),
                    'email' => $user->getEmail(),
                    'googleid' => $user->getId(),
                    'password' => bcrypt('soetomo1')
                ]);

                
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

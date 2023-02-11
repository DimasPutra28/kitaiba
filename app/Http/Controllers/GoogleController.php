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
                $exist = User::where('email', $user->getEmail())->first();
                if ($exist) {
                    $save = $user->getId();
                    Auth::login($exist);
                    $rules = [
                        "googleid" => $save
                    ];
                    User::where('id', auth()->user()->id)->update($rules);
                    return redirect('/');
                }else {
                    $newUser = User::create([
                        'name' => $user->getName(),
                        'username' => $user->getNickname(),
                        'email' => $user->getEmail(),
                        'googleid' => $user->getId(),
                        'email_verified_at' => date("Y-m-d H:i:s")

                    ]);
                    Auth::login($newUser);
                    return redirect('/validasi')->with('success', 'Masukkan username dan password untuk validasi pendaftaran akun');
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            "username" => 'required',
            "password" => 'required'
        ]);
        $user = User::where('username', $request->username)->first();
        // dd($user);
        if($user->email_verified_at == NULL){
            return back()->with('verifikasi', 'Akun belum terverifikasi, Silahkan cek email anda');
        }else{
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                if(auth()->user()->roleid ==1){
                    return redirect()->intended('/dashboard');
                }else{
                    return redirect()->intended('/');
                }
            }
        }
        

        return back()->with('loginError', 'Silahkan coba lagi untuk masuk ke sistem');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use Carbon\Carbon;


class RegisterController extends Controller
{
    public function index()
    {
        return view('signup.index');
    }

    public function verifikasi()
    {
        return view('signup.verifikasi');
    }

    public function store(Request $request)
    {
        // $otp = rand(1000, 9999);
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "email" => 'required|email|unique:users',
            "username" => 'min:5|max:255|unique:users',
            "password" => 'min:5|max:25|confirmed',
            "otp" => 'required'

        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $user = User::where('email', $request->email)->first();
        Mail::send('email.verifikasiemail', ['otp' => $request->otp, 'user' => $user], function($message) use($request){
            $message->to($request->email);
            $message->subject('Verifikasi Akun');
        });
        return redirect('/verifikasi')->with('success', "Silahkan verifikasi akun, Sistem telah mengirim kode otp ke email anda");
    }

    public function postverifikasi(Request $request){
        $user = User::where('otp', $request->otp)->first();
        if($request->otp == $user->otp){
            $rules = [
                "otp" => 'required'
            ];
    
            $validatedData = $request->validate($rules);
            $validatedData['email_verified_at'] = date("Y-m-d H:i:s");
            User::where('id', $user->id)->update($validatedData);
            return redirect('/login')->with('success', 'Akun anda telah terverifikasi, Silahkan masuk');
        }else{
            return back()->with('error', 'Kode otp salah!');
        }
    }
}

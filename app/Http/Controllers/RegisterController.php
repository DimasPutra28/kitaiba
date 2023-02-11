<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('signup.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "email" => 'required|email|unique:users',
            "username" => 'min:5|max:255|unique:users',
            "password" => 'min:5|max:25'

        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['email_verified_at'] = date("Y-m-d H:i:s");

        User::create($validatedData);
        return redirect('/login')->with('success', "Pendaftaran akun berhasil, Silahkan masuk");
    }
}

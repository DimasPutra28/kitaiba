<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function indexforgotpass(){
        return view('password.forgotpassword');
    }

    public function indexresetpass(){
        return view('password.resetpassword');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            "title" => "Bantu Mereka"
        ]);
    }

    public function moneyFormat($amount)
    {
        return '$' . number_format($amount, 2);
    }
}

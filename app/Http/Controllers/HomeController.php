<?php

namespace App\Http\Controllers;

use App\Models\KategoriProgam;
use App\Models\Program;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            "title" => "Bantu Mereka",
            "kategori" => KategoriProgam::all(),
            "program" => Program::where('status', 2)->paginate(10)
        ]);
    }

    public function riwayat(){
        return view('dashboard.riwayatprogram', [
            "title" => "Riwayat Program Donasi",
            "kategori" => KategoriProgam::all(),
            "program" => Program::where('status', 2)->paginate(6)
        ]);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KategoriProgam;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramDonasiController extends Controller
{
    public function index(){
        return view('dashboard.createprogram', [
            "title" => "Buat Penggalangan Dana",
            "kategori" => KategoriProgam::all()
        ]);
    }
}

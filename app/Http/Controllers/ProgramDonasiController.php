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

    public function store (Request $request){
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "id_kategori" => 'required',
            "deskripsi" => 'max:5000',
            "gambar" => 'image|file|max:10240',
            "deadline" => 'required'
        ]);
        $rupiah1 = str_replace('.', '', $request->targetdana);
        $rupiah2 = str_replace('Rp', '', $rupiah1);
        $rupiah3 = str_replace(',00', '', $rupiah2);
        $validatedData['targetdana'] = $rupiah3;

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('program');
        }
        $kategori = KategoriProgam::where('id', $request->id_kategori)->get();
        $validatedData['slug'] = $kategori[0]->slug."-".Str::random(30);
        $validatedData['id_user'] = auth()->user()->id;
        // dd($validatedData);
        Program::create($validatedData);
        $program = Program::where('slug', $validatedData['slug'])->first();
        return back()->with('success', "Program bantuan: $program->nama berhasil ditambahkan");
    }
}

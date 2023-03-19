<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriProgam;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProgramController extends Controller
{
    public function index(){
        $program = Program::all();
        return view('admin.program.index', [
            "title" => "Dashboard-Program",
            "program" => $program
        ]);
    }

    public function indexcreate(){
        return view('admin.program.createprogram', [
            "title" => "Dashboard-BuatProgram",
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
        // dd($request->targetdana);
        $validatedData['targetdana'] = str_replace('.', '', $request->targetdana);
        // dd($validatedData['targetdana']);
        // $this->merge([
        //     'targetdana' => str_replace('Rp, .', '', $request->tagetdana),
        // ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('program');
        }
        $kategori = KategoriProgam::where('id', $request->id_kategori)->get();
        $validatedData['slug'] = $kategori[0]->slug."-".Str::random(30);
        $validatedData['status'] = 2;
        $validatedData['id_user'] = auth()->user()->id;
        // dd($validatedData);
        Program::create($validatedData);
        $program = Program::where('slug', $validatedData['slug'])->first();
        return back()->with('success', "Program bantuan: $program->nama berhasil ditambahkan");
    }


}

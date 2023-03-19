<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\KategoriProgam;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class KategoriProgramController extends Controller
{
    public function index(){
        return view('admin.kategori.index', [
            "title" => "Dashboard-Kategori Program",
            "kategori" => KategoriProgam::all()
        ]);
    }

    public function indexcreate(){
        return view('admin.kategori.createkategoriprogram', [
            "title" => "Dashboard-BuatKategoriProgram"
        ]);
    }

    public function store (Request $request){
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "slug" => 'required|unique:kategori_progams'
        ]);
        $validatedData['id_user'] = auth()->user()->id;
        KategoriProgam::create($validatedData);
        $new = KategoriProgam::where('slug', $request->slug)->first();
        return back()->with('success', "Kategori program: $new->nama berhasil ditambahkan");
    }

    public function indexupdate($slug){
        $kategori = KategoriProgam::where('slug', $slug)->get();
        return view('admin.kategori.updatekategori', [
            "title" => "Update Kategori | ".$kategori[0]->nama,
            "kategori" => KategoriProgam::where('slug', $slug)->get()
        ]);
    }

    public function update(Request $request){
        $oldslug=request('oldslug');
        $id=$request->id;
        $rules = [
            "nama" => 'required|max:255'
        ];

        if($request->slug != $oldslug){
            $rules['slug'] = 'required|unique:kategori_progams';
        }

        $validatedData = $request->validate($rules);

        $validatedData['id_user'] = auth()->user()->id;
        KategoriProgam::where('id', $id)->update($validatedData);
        $new = KategoriProgam::where('id', $id)->get();
        return redirect()->route('updatekategori', ['slug' => $new[0]->slug])->with('success', "Kategori program berhasil diupdate");
    }

    public function destroy(){
        $id=request('id');
        $swap = KategoriProgam::where('id', $id)->first();
        KategoriProgam::destroy($id);
        return redirect()->back()->with('success', "Kategori program: $swap->nama berhasil dihapus");
    }

    public function listprogram($slug){
        $kategori = KategoriProgam::where('slug', $slug)->get();
        return view('admin.kategori.listprogamkategori', [
            "title" => "Daftar Program Kategori: ".$kategori[0]->nama,
            "kategori" => KategoriProgam::where('slug', $slug)->get(),
            "program" => Program::where('id_kategori', $kategori[0]->id)->get()
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(KategoriProgam::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}

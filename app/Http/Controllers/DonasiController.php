<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDonasiRequest;
use App\Http\Requests\UpdateDonasiRequest;
use App\Models\Program;
use Illuminate\Support\Str;

class DonasiController extends Controller
{
    public function index($slug)
    {
        return view('dashboard.donasi', [
            "title" => "Donasi",
            "program" => Program::where('slug', $slug)->first()
        ]);
    }

    public function store(Request $request)
    {
        if($request->anonim2 == "on"){
            $validatedData['anonim'] = $request->anonim;
        }else{
            $validatedData['anonim'] = null;
        }
        // dd($request->all());
        if($request->nominal2 == "on"){
            $rupiah1 = str_replace('.', '', $request->nominal);
            $rupiah2 = str_replace('Rp', '', $rupiah1);
            $rupiah3 = str_replace(',00', '', $rupiah2);
            $validatedData['nominal'] = $rupiah3;
        }else{
            $validatedData['nominal'] = $request->nominal2;
        }
        $validatedData['doa'] = $request->doa;
        $validatedData['slug'] = Str::random(30);
        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['id_program'] = $request->id_program;
        $program = Program::where('id', $request->id_program)->first();
        // dd($program->danaskrg);
        // $program['danaskrg'] =+  $validatedData['nominal'];
        $update['danaskrg'] = $program['danaskrg'] +  $validatedData['nominal'];
        Program::where('id', $request->id_program)->update($update);
        Donasi::create($validatedData);

        return back()->with('success', "Donasi yang anda lakukan berhasil, terimakasih orang baik");

    }

}

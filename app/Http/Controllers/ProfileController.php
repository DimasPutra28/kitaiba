<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index()
    {
        $program = DB::table('donasis')
            ->groupBy('id_program')
            ->select('id_program', DB::raw('COUNT(*) as total_users'))
            ->get();
        return view('profile.index', [
            "title" => "Profil Donatur",
            "donasi" => Donasi::where('id_user', auth()->user()->id)->get(),
            "program" => $program,
            "my" => Program::where('id_user', auth()->user()->id)->get()
        ]);
    }

    public function editprofile()
    {
        $program = DB::table('donasis')
            ->groupBy('id_program')
            ->select('id_program', DB::raw('COUNT(*) as total_users'))
            ->get();
        return view('profile.editprofile', [
            "title" => "Edit Profil Donatur",
            "donasi" => Donasi::where('id_user', auth()->user()->id)->get(),
            "program" => $program,
            "my" => Program::where('id_user', auth()->user()->id)->get()
        ]);
    }

    public function edit(Request $request)
    {
        try {
            $user = $request->id;
            $rules = [
                "name" => 'required|max:255',
                // "username" => 'required|unique:users',
                "notelp" => 'max:5000',
                "tgllahir" => 'required',
                "gender" => 'required',
                "gambar" => 'image|file|max:10240'
            ];

            if($request->username != auth()->user()->username){
                $rules = [
                    "username" => 'required|unique:users'
                ];
                // $validatedData['username'] = $request->username;
            }

            $validatedData = $request->validate($rules);

            if ($request->file('gambar')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['gambar'] = $request->file('gambar')->store('profil-user');
            }
            User::where('id', $user)->update($validatedData);
            return redirect('/profile')->with('success', 'Profil berhasil diupdate!');
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function transaksi(){
        $program = DB::table('donasis')
            ->groupBy('id_program')
            ->select('id_program', DB::raw('COUNT(*) as total_users'))
            ->get();
        return view('profile.transaksisaya', [
            "title" => "Riwayat Transaksi Saya",
            "donasi" => Donasi::where('id_user', auth()->user()->id)->latest()->get(),
            "program" => $program,
            "my" => Program::where('id_user', auth()->user()->id)->get()
        ]);

    }

    public function penggalangan(){
        $program = DB::table('donasis')
            ->groupBy('id_program')
            ->select('id_program', DB::raw('COUNT(*) as total_users'))
            ->get();
        return view('profile.programyangdibuat', [
            "title" => "Penggalangan Dana Saya",
            "donasi" => Donasi::where('id_user', auth()->user()->id)->latest()->get(),
            "program" => $program,
            "myprogram" => Program::where('id_user', auth()->user()->id)->latest()->get()
        ]);
    }
}

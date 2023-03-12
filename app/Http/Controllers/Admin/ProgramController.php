<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function index(){
        return view('admin.program.index', [
            "title" => "Dashboard-Program"
        ]);
    }

    public function indexcreate(){
        return view('admin.program.createprogram', [
            "title" => "Dashboard-BuatProgram"
        ]);
    }
}

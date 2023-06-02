<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    public function index()
    {

    }

    public function konten(){
        return view('blog.detailblog', [
            "title" => "Berita Kontol"
        ]);
    }
}

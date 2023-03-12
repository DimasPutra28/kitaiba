<?php

namespace App\Models;

use App\Models\User;
use App\Models\KategoriProgam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function kategori(){
        return $this->belongsTo(KategoriProgam::class, 'id_kategori');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}

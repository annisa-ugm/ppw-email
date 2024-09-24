<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = ['judul', 'penulis', 'harga', 'tgl_terbit'];
}

//representasi dari tabel database yg dukung operasi db
//kaya baca, update, dan hapus data tanpa tulis kueri manual


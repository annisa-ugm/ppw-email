<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahkan code berikut untuk memanggil model buku yang sudah dibuat
use App\Models\Buku;

class BukuController extends Controller
{
    public function index (){
        $data_buku = Buku::all()->sortBy('id');
        $jumlah_buku = $data_buku->count();
        $total_harga = $data_buku->sum('harga');

        return view('buku.index', compact('data_buku', 'jumlah_buku', 'total_harga'));

        
    }
}


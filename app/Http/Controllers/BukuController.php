<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahkan code berikut untuk memanggil model buku yang sudah dibuat
use App\Models\Buku;

class BukuController extends Controller
{
    public function index (){
        $data_buku = Buku::all()->sortBy('index');
//Buku::all adl kumpulan data dari tabel bukus yg disortir dgn sortBy('index')
//dan disimpan dalam variabel $data_buku
        return view('buku.index', compact('data_buku'));
        //fungsi compact() buat kirim data dri controller ke view
        //compact ini bikin array asosiatif yg isinya var. data_buku dan isinya
        //nilai dari var $data_buku di controller
        //nnti di view bisa diakses pake $data_buku jga
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $buku = new Buku();
        //model Buku dipake buat bikin instance/objek baru dr tabel bukus
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        //field2 sprti judul, penulis, dll diisi dgn data yg dikirim lewat form $request
        $buku->save();
        //simpan data tsb ke tabel bukus di database

        return redirect('/buku');
        //mengarahkan user ke URL yang ditentukan, jd setelah controller
        //selesai dieksekusi 
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        //model Buku dipake buat cari data buku bdsr $id
        $buku->delete();
        //method delete buat hapus dri db

        return redirect('/buku');
    }

    public function edit($id) {
    
        return view('buku.edit', ['buku' => Buku::find($id)]);
        //model Buku dipake buat ambil 1 data buku dri tabel
        //bdsr $id pake method find($id). abis ketemu dikirim ke view buku.edit formnya
    }

    public function update(Request $request, $id)
    {
        Buku::find($id)->update($request->only(['judul', 'penulis', 'harga', 'tgl_terbit']));
        
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }

}


//controller sbg penghubung antara model, view & request pengguna
//lalu beri respon yg sesuai
//menyimpan logika yg ada di web, misal apa yg terjadi jika
//user kirim form, modif data/ ambil data dari database
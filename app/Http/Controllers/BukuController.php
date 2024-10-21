<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
//tambahkan code berikut untuk memanggil model buku yang sudah dibuat
use App\Models\Buku;

class BukuController extends Controller
{
    public function index (){
        Paginator::useBootstrapFive();
        $batas = 5;
        $data_buku = Buku::all()->sortBy('index');
        $jumlah_buku = Buku::count();
        $total_harga = $data_buku->sum('harga');
        return view('buku.index', compact('data_buku', 'jumlah_buku', 'total_harga'));

    }

    // public function index() {
    //     Paginator::useBootstrapFive();
    //     $batas = 5;
    //     $jumlah_buku = Buku::count();
    //     $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
    //     $no = $batas * ($data_buku->currentPage() - 1);
    //     return view('buku.index', compact('data_buku', 'no','jumlah_buku'));
    // }

    public function search(Request $request) {
        Paginator::useBootstrapFive();
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")
        ->orwhere('penulis','like', "%".$cari."%" )
        ->paginate($batas);
        $jumlah_buku = $data_buku->count();
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku.search', compact('jumlah_buku', 'data_buku', 'no',
        'cari'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' =>'required|date'
        ]);

        $buku = new Buku();
        //model Buku dipake buat bikin instance/objek baru dr tabel bukus
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        //field2 sprti judul, penulis, dll diisi dgn data yg dikirim lewat form $request
        $buku->save();
        //simpan data tsb ke tabel bukus di database

        return redirect('/buku')->with('pesan', 'Data buku berhasil di simpan');
        //mengarahkan user ke URL yang ditentukan, jd setelah controller
        //selesai dieksekusi
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        //model Buku dipake buat cari data buku bdsr $id
        $buku->delete();
        //method delete buat hapus dri db

        return redirect('/buku')->with('hapus', 'Data buku berhasil dihapus');
    }

    public function edit($id) {

        return view('buku.edit', ['buku' => Buku::find($id)]);
        //model Buku dipake buat ambil 1 data buku dri tabel
        //bdsr $id pake method find($id). abis ketemu dikirim ke view buku.edit formnya
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' =>'required|date'
        ]);

        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        // Buku::find($id)->update($request->only(['judul', 'penulis', 'harga', 'tgl_terbit']));

        return redirect()->route('buku.index')->with('update', 'Data buku berhasil diupdate');
    }

}


//controller sbg penghubung antara model, view & request pengguna
//lalu beri respon yg sesuai
//menyimpan logika yg ada di web, misal apa yg terjadi jika
//user kirim form, modif data/ ambil data dari database

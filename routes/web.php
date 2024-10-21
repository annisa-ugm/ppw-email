<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BukuController;
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');

Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
//PUT digunakan untuk memperbarui data yang sudah ada di server. biasanya setelah nulis di form trus klik simpan& diidentifikasi bdsr id nya
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
// Route::post('/buku/edit', [BukuController::class, 'edit'])->name('buku.edit');

Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

// Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//perbedaan route yg ga dinamain dan dikasi alias
//kalo misal mau manggil ya return redirect('/buku/' .$id);
//kalo dh dikasi alias ya tinggak buku.update


//route berfungsi sbg penghubung antara URL yg diakses
//pengguna dan aksi dlm controller

//get: digunakan utk dapatkan data
//post: utk mengirim data, misal simpan data ke database
//put/patch: untuk perbarui data, misal buat update
//delete: buat hapus data

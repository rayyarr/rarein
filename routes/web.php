<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('one');
})->name('lp');

Auth::routes();

Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/tambah', [HomeController::class, 'tambah'])->name('tambah');
// Rute untuk menampilkan formulir unggah gambar profil
Route::get('/profil', [ProfileController::class, 'index'])->name('profil');

// Rute untuk menangani unggah gambar profil
Route::post('/profil', [ProfileController::class, 'store'])->name('upload.profile.image');

Route::get('/pasangan', function(){
    return view('pasangan');
});

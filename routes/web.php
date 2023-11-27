<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SetupUser_1_PasanganController;

Route::get('/', function () {
    if (auth()->check()) {
        // Jika pengguna sudah login
        if (auth()->user()->role === 'admin') {
            // Jika pengguna adalah admin, alihkan ke halaman admin
            return redirect('/admin');
        } else {
            // Jika pengguna adalah user biasa, alihkan ke halaman beranda
            return redirect('/beranda');
        }
    }

    // Jika belum login, tampilkan halaman one
    return view('one');
})->name('lp');


Route::get('/play', function(){return view('template.template2');});

// hanya bisa diakses jika sudah login
Auth::routes();
Route::group(['middleware' => 'user'], function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::resource('/setup', SetupUser_1_PasanganController::class);
    Route::get('/tambah', [HomeController::class, 'tambah'])->name('tambah');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::post('/profil', [ProfileController::class, 'store'])->name('upload.profile.image');
    //Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
});

// hanya bisa diakses oleh admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('/admin/template', TemplateController::class);
});

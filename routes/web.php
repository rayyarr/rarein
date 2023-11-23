<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TemplateController;

Route::get('/', function () {
    return view('one');
})->name('lp');

// hanya bisa diakses jika sudah login
Auth::routes();
Route::group(['middleware' => 'user'], function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::get('/tambah', [HomeController::class, 'tambah'])->name('tambah');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::post('/profil', [ProfileController::class, 'store'])->name('upload.profile.image');
    //Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/pasangan', function(){return view('pasangan');});
});

// hanya bisa diakses oleh admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('beranda');
    Route::resource('/admin/template', TemplateController::class);
});

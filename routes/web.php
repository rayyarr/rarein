<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WebUndanganController;
use App\Http\Controllers\CrudTamuController;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\SetupUserUtama;

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

Route::get('/mulai', function () {
    return view('user.setup_acara');
});

Route::get('/demo', [WebUndanganController::class, 'index']);

// hanya bisa diakses user
Auth::routes();
Route::group(['middleware' => 'user'], function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::resource('/setup', SetupUserUtama::class)->except(['publish']);
    Route::post('/setup/publish', [SetupUserUtama::class, 'publish'])->name('setup.publish');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::post('/profil', [ProfileController::class, 'store'])->name('upload.profile.image');
    //Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/tambah', [HomeController::class, 'tambah'])->name('tambah');
    Route::get('/tambah/create', [WebUndanganController::class, 'create']);

    Route::get('/tamu', [CrudTamuController::class, 'index'])->name('tamu.index');
    Route::get('/tamu/tambah', [CrudTamuController::class, 'tambah'])->name('tamu.tambah');
    Route::post('/tamu/store', [CrudTamuController::class, 'store'])->name('tamu.store');
    Route::get('/tamu/edit/{id}', [CrudTamuController::class, 'edit'])->name('tamu.edit');
    Route::put('/tamu/update/{id}', [CrudTamuController::class, 'update'])->name('tamu.update');
    Route::get('/tamu/hapus/{id}', [CrudTamuController::class, 'delete'])->name('tamu.delete');
});

// hanya bisa diakses admin
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::resource('pengaturan', AdminSettingController::class)->names([
        'index' => 'admin.pengaturan.index',
        'create' => 'admin.pengaturan.create',
        'store' => 'admin.pengaturan.store',
        'show' => 'admin.pengaturan.show',
        'edit' => 'admin.pengaturan.edit',
        'destroy' => 'admin.pengaturan.destroy',
    ])->except(['update']);

    Route::patch('/pengaturan', [AdminSettingController::class, 'update'])->name('admin.pengaturan.update');

    Route::resource('pengguna', CrudUserController::class);
    Route::resource('template', TemplateController::class);
});

// bisa diakses siapa saja
Route::middleware('auth')->group(function () {
    
});

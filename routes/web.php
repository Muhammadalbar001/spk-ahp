<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\PairwiseController;
use App\Http\Controllers\Admin\KriteriaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware(['auth', 'role:admin']);

// Siswa
Route::get('/siswa/dashboard', function () {
    return view('siswa.dashboard');
})->name('siswa.dashboard')->middleware(['auth', 'role:siswa']);

// Wali Kelas
Route::get('/wali/dashboard', function () {
    return view('wali.dashboard');
})->name('wali.dashboard')->middleware(['auth', 'role:wali_kelas']);

// Waka Kesiswaan
Route::get('/waka/dashboard', function () {
    return view('waka.dashboard');
})->name('waka.dashboard')->middleware(['auth', 'role:waka_kesiswaan']);

// Guru Penyeleksi
Route::get('/penyeleksi/dashboard', function () {
    return view('penyeleksi.dashboard');
})->name('penyeleksi.dashboard')->middleware(['auth', 'role:guru_penyeleksi']);

// Kepala Sekolah
Route::get('/kepsek/dashboard', function () {
    return view('kepsek.dashboard');
})->name('kepsek.dashboard')->middleware(['auth', 'role:kepsek']);

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('kriteria', KriteriaController::class)->only(['index', 'create', 'store']);
    Route::get('pairwise', [PairwiseController::class, 'index'])->name('pairwise.index');
    Route::post('pairwise', [PairwiseController::class, 'store'])->name('pairwise.store');
    Route::get('pairwise/ahp/proses', [PairwiseController::class, 'prosesAHP'])->name('pairwise.proses');

});



require __DIR__.'/auth.php';
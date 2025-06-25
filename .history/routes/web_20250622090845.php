<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\PairwiseController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\HasilAHPController;
use App\Http\Controllers\Siswa\HasilSiswaController;
use App\Http\Controllers\NilaiController;

Route::get('/', fn() => view('welcome'));

Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 🧑 Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Role-based Dashboards
Route::middleware(['auth'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard')->middleware('role:admin')->name('admin.dashboard');
    Route::view('/siswa/dashboard', 'siswa.dashboard')->middleware('role:siswa')->name('siswa.dashboard');
    Route::view('/wali/dashboard', 'wali.dashboard')->middleware('role:wali_kelas')->name('wali.dashboard');
    Route::view('/waka/dashboard', 'waka.dashboard')->middleware('role:waka_kesiswaan')->name('waka.dashboard');
    Route::view('/penyeleksi/dashboard', 'penyeleksi.dashboard')->middleware('role:guru_penyeleksi')->name('penyeleksi.dashboard');
    Route::view('/kepsek/dashboard', 'kepsek.dashboard')->middleware('role:kepsek')->name('kepsek.dashboard');
});

// 📁 Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('kriteria', KriteriaController::class)->only(['index', 'create', 'store']);

    Route::get('pairwise', [PairwiseController::class, 'index'])->name('pairwise.index');
    Route::post('pairwise', [PairwiseController::class, 'store'])->name('pairwise.store');
    Route::get('pairwise/ahp/proses', [PairwiseController::class, 'prosesAHP'])->name('pairwise.proses');

    Route::get('hasil-ranking', [HasilAHPController::class, 'index'])->name('hasil.index');
    Route::get('hasil-ranking/cetak', [HasilAHPController::class, 'cetakPDF'])->name('hasil.cetak');
});

// 🧑‍🎓 Siswa
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('hasil', [HasilSiswaController::class, 'index'])->name('hasil.index');
    Route::get('hasil/cetak', [HasilSiswaController::class, 'cetak'])->name('hasil.cetak');
    Route::get('daftar', [App\Http\Controllers\Siswa\SiswaDataController::class, 'create'])->name('daftar');
    Route::post('daftar', [App\Http\Controllers\Siswa\SiswaDataController::class, 'store'])->name('daftar.store');

});

// 🧑‍🏫 Kepala Sekolah
Route::middleware(['auth', 'role:kepsek'])->prefix('kepsek')->name('kepsek.')->group(function () {
    Route::get('hasil', [HasilAHPController::class, 'index'])->name('hasil.index');
});

// 🧑‍🏫 Penilai (Wali Kelas, Waka Kesiswaan, Penyeleksi)
Route::middleware(['auth'])->group(function () {
    Route::prefix('wali')->middleware('role:wali_kelas')->name('wali.')->group(function () {
        Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
        Route::post('nilai', [NilaiController::class, 'store'])->name('nilai.store');
    });

    Route::prefix('waka')->middleware('role:waka_kesiswaan')->name('waka.')->group(function () {
        Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
        Route::post('nilai', [NilaiController::class, 'store'])->name('nilai.store');
    });

    Route::prefix('penyeleksi')->middleware('role:guru_penyeleksi')->name('penyeleksi.')->group(function () {
        Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
        Route::post('nilai', [NilaiController::class, 'store'])->name('nilai.store');
    });
});

require __DIR__.'/auth.php';
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\PairwiseController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\HasilAHPController;
use App\Http\Controllers\Siswa\HasilSiswaController;
use App\Http\Controllers\Siswa\SiswaDashboardController;
use App\Http\Controllers\Siswa\SiswaDataController;
use App\Http\Controllers\NilaiController;

Route::get('/', fn() => view('welcome'));

// ✅ Dashboard Awal
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ✅ Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Admin Dashboard + Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('siswa', SiswaController::class);
    Route::resource('kriteria', KriteriaController::class)->only(['index', 'create', 'store']);
    Route::get('pairwise', [PairwiseController::class, 'index'])->name('pairwise.index');
    Route::post('pairwise', [PairwiseController::class, 'store'])->name('pairwise.store');
    Route::get('pairwise/ahp/proses', [PairwiseController::class, 'prosesAHP'])->name('pairwise.proses');
    Route::get('hasil-ranking', [HasilAHPController::class, 'index'])->name('hasil.index');
    Route::get('hasil-ranking/cetak', [HasilAHPController::class, 'cetakPDF'])->name('hasil.cetak');
    Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
    Route::post('nilai', [NilaiController::class, 'store'])->name('nilai.store');

});

// ✅ Siswa Dashboard + Hasil + Pendaftaran Data Diri
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard'); // <--- GANTI view jadi controller
    Route::get('hasil', [HasilSiswaController::class, 'index'])->name('hasil.index');
    Route::get('hasil/cetak', [HasilSiswaController::class, 'cetak'])->name('hasil.cetak');
    Route::get('daftar', [SiswaDataController::class, 'create'])->name('daftar');
    Route::post('daftar', [SiswaDataController::class, 'store'])->name('daftar.store');
});

// ✅ Kepala Sekolah
Route::middleware(['auth', 'role:kepsek'])->prefix('kepsek')->name('kepsek.')->group(function () {
    Route::view('dashboard', 'kepsek.dashboard')->name('dashboard');
    Route::get('hasil', [HasilAHPController::class, 'index'])->name('hasil.index');
});

// ✅ Wali, Waka, Penyeleksi Input Nilai
Route::middleware(['auth'])->group(function () {
    Route::prefix('wali')->middleware('role:wali_kelas')->name('wali.')->group(function () {
        Route::view('dashboard', 'wali.dashboard')->name('dashboard');
        Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
        Route::post('nilai', [NilaiController::class, 'store'])->name('nilai.store');
    });

    Route::prefix('waka')->middleware('role:waka_kesiswaan')->name('waka.')->group(function () {
        Route::view('dashboard', 'waka.dashboard')->name('dashboard');
        Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
        Route::post('nilai', [NilaiController::class, 'store'])->name('nilai.store');
    });

    Route::prefix('penyeleksi')->middleware('role:guru_penyeleksi')->name('penyeleksi.')->group(function () {
        Route::view('dashboard', 'penyeleksi.dashboard')->name('dashboard');
        Route::get('nilai', [NilaiController::class, 'index'])->name('nilai.index');
        Route::post('nilai', [NilaiController::class, 'store'])->name('nilai.store');
    });
});

require __DIR__.'/auth.php';
<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', Auth::id())->first();
        $semuaSiswa = Siswa::all(); // Kalau ingin tampilkan semua

        return view('siswa.dashboard', compact('siswa', 'semuaSiswa'));
    }
}
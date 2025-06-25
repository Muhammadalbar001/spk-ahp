<?php
namespace App\Http\Controllers;

use App\Models\NilaiSiswa;
use App\Models\Siswa;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $siswa = Siswa::all();
        $allKriteria = Kriteria::all();

        // mapping kode role → kriteria
        $kodeBoleh = match ($user->role) {
            'wali_kelas' => ['RN'],
            'waka_kesiswaan' => ['KP'],
            'guru_penyeleksi' => ['WA', 'PI', 'PA', 'SN'],
            default => [],
        };

        // ambil kriteria yang diizinkan berdasarkan KODE (case-sensitive)
        $kriteria = $allKriteria->filter(fn($k) => in_array(strtoupper($k->kode), $kodeBoleh))->values();
        $nilai = NilaiSiswa::all();
        $routePrefix = match ($user->role) {
            'wali_kelas' => 'wali',
            'waka_kesiswaan' => 'waka',
            'guru_penyeleksi' => 'penyeleksi',
            default => ''
        };

        return view('penilai.nilai.index', compact('siswa', 'kriteria', 'nilai', 'routePrefix'));

    }

    public function store(Request $request)
    {
        foreach ($request->nilai as $siswaId => $kriteriaSet) {
            foreach ($kriteriaSet as $kriteriaId => $nilai) {
                NilaiSiswa::updateOrCreate(
                    [
                        'siswa_id' => $siswaId,
                        'kriteria_id' => $kriteriaId,
                        'user_id' => Auth::id()
                    ],
                    [
                        'nilai' => $nilai
                    ]
                );
            }
        }

        return back()->with('success', 'Nilai berhasil disimpan.');
    }
    
}
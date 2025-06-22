<?php

namespace App\Http\Controllers\Admin;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\NilaiSiswa;
use App\Models\HasilAHP;
use App\Http\Controllers\Controller;
use PDF;

class HasilAHPController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $kriteria = Kriteria::all();
        $nilai = NilaiSiswa::all();

        $hasil = [];

        foreach ($siswa as $s) {
            $total = 0;
            foreach ($kriteria as $k) {
                $nilaiInput = $nilai->firstWhere(fn($n) => 
                    $n->siswa_id == $s->id && $n->kriteria_id == $k->id
                );
                $nilaiAngka = $nilaiInput->nilai ?? 0;
                $bobot = $k->bobot ?? 0;
                $total += $nilaiAngka * $bobot;
            }

            $hasil[] = [
                'siswa' => $s,
                'skor' => $total
            ];
        }

        usort($hasil, fn($a, $b) => $b['skor'] <=> $a['skor']);

        foreach ($hasil as $i => $row) {
            HasilAHP::updateOrCreate(
                ['siswa_id' => $row['siswa']->id],
                ['skor_akhir' => $row['skor'], 'ranking' => $i + 1]
            );
        }

        $hasilFix = HasilAHP::with('siswa')->orderBy('ranking')->get();
        return view('admin.hasil.index', compact('hasilFix'));
    }

    public function cetakPDF()
    {
        $hasil = HasilAHP::with('siswa')->orderBy('ranking')->get();
        $tanggal = now()->format('d M Y H:i');

        $pdf = PDF::loadView('admin.hasil.pdf', compact('hasil', 'tanggal'))
                ->setPaper('a4', 'portrait');

        return $pdf->download('Laporan-Hasil-Ranking-AHP.pdf');
    }
}
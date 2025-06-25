<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ResetController extends Controller
{
    public function pairwise()
    {
        DB::table('pairwise_kriteria')->truncate();
        return back()->with('success', 'Data Pairwise Kriteria berhasil direset.');
    }

    public function nilai()
    {
        DB::table('nilai_siswa')->truncate();
        return back()->with('success', 'Data Nilai Siswa berhasil direset.');
    }

    public function hasil()
    {
        DB::table('hasil_ahp')->truncate();
        return back()->with('success', 'Data Hasil AHP berhasil direset.');
    }
}
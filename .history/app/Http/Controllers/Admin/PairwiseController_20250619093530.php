<?php
namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use App\Models\PairwiseKriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PairwiseController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('admin.pairwise.index', compact('kriteria'));
    }

    public function store(Request $request)
    {
        PairwiseKriteria::truncate(); // Reset matrix

        foreach ($request->nilai as $i => $row) {
            foreach ($row as $j => $val) {
                if ($i !== $j) {
                    PairwiseKriteria::create([
                        'kriteria_1_id' => $i,
                        'kriteria_2_id' => $j,
                        'nilai' => $val
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Matrix berhasil disimpan.');
    }
    public function prosesAHP()
{
    $kriteria = Kriteria::all();
    $n = $kriteria->count();

    // 💥 Cegah error jika belum ada kriteria
    if ($n < 2) {
        return redirect()->route('admin.pairwise.index')->with('error', 'Minimal harus ada 2 kriteria untuk proses perhitungan AHP.');
    }

    // 1. Buat matriks pairwise dari database
    $matrix = [];
    foreach ($kriteria as $i) {
        foreach ($kriteria as $j) {
            if ($i->id == $j->id) {
                $matrix[$i->id][$j->id] = 1;
            } else {
                $val = PairwiseKriteria::where('kriteria_1_id', $i->id)
                        ->where('kriteria_2_id', $j->id)->value('nilai');

                if ($val) {
                    $matrix[$i->id][$j->id] = $val;
                } else {
                    $inv = PairwiseKriteria::where('kriteria_1_id', $j->id)
                            ->where('kriteria_2_id', $i->id)->value('nilai');
                    $matrix[$i->id][$j->id] = $inv ? 1 / $inv : 1;
                }
            }
        }
    }

    // 2. Hitung total kolom
    $totalKolom = [];
    foreach ($kriteria as $j) {
        $sum = 0;
        foreach ($kriteria as $i) {
            $sum += $matrix[$i->id][$j->id];
        }
        $totalKolom[$j->id] = $sum;
    }

    // 3. Normalisasi & eigen vector
    $normal = [];
    $eigen = [];
    foreach ($kriteria as $i) {
        $sum = 0;
        foreach ($kriteria as $j) {
            $normal[$i->id][$j->id] = $matrix[$i->id][$j->id] / $totalKolom[$j->id];
            $sum += $normal[$i->id][$j->id];
        }
        $eigen[$i->id] = $sum / $n;

        // simpan bobot ke tabel
        Kriteria::where('id', $i->id)->update([
            'bobot' => $eigen[$i->id]
        ]);
    }

    // 4. Hitung λ_max
    $lambda = 0;
    foreach ($kriteria as $i) {
        $sumRow = 0;
        foreach ($kriteria as $j) {
            $sumRow += $matrix[$i->id][$j->id] * $eigen[$j->id];
        }
        $lambda += $sumRow / $eigen[$i->id];
    }
    $lambda_max = $lambda / $n;

    // 5. CI & CR
    $ci = ($lambda_max - $n) / ($n - 1);
    $ri = [
        1 => 0.00,
        2 => 0.00,
        3 => 0.58,
        4 => 0.90,
        5 => 1.12,
        6 => 1.24,
        7 => 1.32,
        8 => 1.41,
        9 => 1.45,
        10 => 1.49
    ];
    $cr = ($n <= 10 && isset($ri[$n]) && $ri[$n] != 0)
    ? $ci / $ri[$n]
    : 0;



    return view('admin.pairwise.hasil', compact('kriteria', 'matrix', 'normal', 'eigen', 'lambda_max', 'ci', 'cr'));
}


}
<?php
namespace App\Http\Controllers\Siswa;

use App\Models\Siswa;
use App\Models\HasilAHP;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use PDF;

class HasilSiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->firstOrFail();
        $hasil = HasilAHP::where('siswa_id', $siswa->id)->first();

        return view('siswa.hasil.index', compact('siswa', 'hasil'));
    }

    public function cetak()
    {
        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->firstOrFail();
        $hasil = HasilAHP::where('siswa_id', $siswa->id)->first();
        $tanggal = now()->format('d M Y H:i');

        $pdf = PDF::loadView('siswa.hasil.pdf', compact('siswa', 'hasil', 'tanggal'))
                ->setPaper('a4', 'portrait');

        return $pdf->download('Bukti-Hasil-Seleksi.pdf');
    }
}
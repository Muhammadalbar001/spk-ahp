<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaDataController extends Controller
{
    public function create()
    {
        return view('siswa.daftar');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nisn' => 'required|string|max:20|unique:siswa,nisn',
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:L,P',
        'alamat' => 'required|string|max:255',
        'foto' => 'nullable|image|max:2048',
    ], [
        'nisn.unique' => 'NISN sudah terdaftar, silakan gunakan NISN lain.',
    ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_siswa', 'public');
        }

        Siswa::create([
            'user_id' => Auth::id(),
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
        ]);

        return redirect()
        ->route('siswa.dashboard')
        ->with('success', 'Pendaftaran berhasil. Data siswa telah disimpan.');
}
public function index()
    {
        // Ambil data siswa yang login (berdasarkan user_id)
        $siswa = Siswa::where('user_id', Auth::id())->first();

        // Ambil semua siswa lain yang terdaftar (untuk ditampilkan)
        $semuaSiswa = Siswa::with('user')->get();

        return view('siswa.dashboard', compact('siswa', 'semuaSiswa'));
    }
}
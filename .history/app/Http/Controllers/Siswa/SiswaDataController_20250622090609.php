<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class SiswaDataController extends Controller
{
    public function create()
    {
        return view('siswa.daftar'); // siswa/daftar.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
        ]);

        // Cek apakah sudah pernah mengisi
        $exists = Siswa::where('user_id', Auth::id())->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'Data sudah terisi sebelumnya.');
        }

        Siswa::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('siswa.dashboard')->with('success', 'Data berhasil disimpan.');
    }
}
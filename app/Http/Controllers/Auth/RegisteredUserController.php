<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'nisn' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
        ]);

        // Buat user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        // Buat data siswa terkait
        Siswa::create([
            'user_id' => $user->id,
            'nama' => $request->name,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('siswa.dashboard');
    }
}
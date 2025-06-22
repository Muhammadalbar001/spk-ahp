<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses permintaan login.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Arahkan ke dashboard sesuai role
            $role = Auth::user()->role;
            return match ($role) {
                'admin' => redirect()->route('admin.dashboard'),
                'siswa' => redirect()->route('siswa.dashboard'),
                'wali_kelas' => redirect()->route('wali.dashboard'),
                'waka_kesiswaan' => redirect()->route('waka.dashboard'),
                'guru_penyeleksi' => redirect()->route('penyeleksi.dashboard'),
                'kepsek' => redirect()->route('kepsek.dashboard'),
                default => redirect('/dashboard'),
            };
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    /**
     * Logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

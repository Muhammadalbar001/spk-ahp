<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::guard($guard)->user()->role ?? 'default';

                $url = match ($role) {
                    'admin' => route('admin.dashboard'),
                    'siswa' => route('siswa.dashboard'),
                    'wali_kelas' => route('wali.dashboard'),
                    'waka_kesiswaan' => route('waka.dashboard'),
                    'guru_penyeleksi' => route('penyeleksi.dashboard'),
                    'kepsek' => route('kepsek.dashboard'),
                    default => '/',
                };

                return redirect($url);
            }
        }

        return $next($request);
    }
}
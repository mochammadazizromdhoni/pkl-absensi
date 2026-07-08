<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Proses login: verifikasi kredensial, lalu terapkan single-device lock.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'device_fingerprint' => ['required', 'string', 'min:10'],
        ], [
            'device_fingerprint.required' => 'Perangkat tidak terverifikasi. Pastikan JavaScript aktif lalu muat ulang halaman.',
            'device_fingerprint.min' => 'Perangkat tidak terverifikasi. Pastikan JavaScript aktif lalu muat ulang halaman.',
        ]);

        // Throttle percobaan login per email + IP (standar Laravel).
        $throttleKey = Str::lower($credentials['email']).'|'.$request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => "Terlalu banyak percobaan login. Coba lagi dalam {$seconds} detik.",
            ]);
        }

        if (! Auth::attempt(
            ['email' => $credentials['email'], 'password' => $credentials['password']],
            $request->boolean('remember')
        )) {
            RateLimiter::hit($throttleKey, 60);

            throw ValidationException::withMessages([
                'email' => 'Username atau password salah.',
            ]);
        }

        RateLimiter::clear($throttleKey);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $incomingFingerprint = $credentials['device_fingerprint'];

        if (is_null($user->device_id)) {
            // Login pertama kalinya — kunci akun ini ke perangkat/browser sekarang.
            $user->forceFill([
                'device_id' => $incomingFingerprint,
                'device_locked_at' => now(),
            ])->save();
        } elseif (! hash_equals($user->device_id, $incomingFingerprint)) {
            // Fingerprint tidak cocok -> batalkan sesi, JANGAN biarkan login lanjut.
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'device' => 'Maaf, perangkat Anda sudah terkunci. Silakan hubungi admin untuk mereset perangkat Anda.',
            ]);
        }

        $request->session()->regenerate();

        // TODO: sesuaikan redirect ini dengan route dashboard per-role kamu
        // (mis. redirect ke route berbeda untuk admin/guru/siswa/staff jika perlu).
        return redirect()->intended('/dashboard');
    }

    /**
     * Logout. Tidak mereset device_id — device tetap terkunci ke akun ini
     * sampai admin yang mereset lewat UserController::resetDevice().
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
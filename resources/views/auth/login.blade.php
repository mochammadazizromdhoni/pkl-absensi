<x-auth-layout>
    <main class="auth-shell auth-font relative min-h-screen w-full overflow-hidden lg:flex lg:items-stretch">
        <div class="auth-blob auth-blob-a"></div>
        <div class="auth-blob auth-blob-b"></div>

        {{-- LEFT: brand, headline, signature grid, feature grid --}}
        <aside class="relative z-10 w-full px-5 pt-8 pb-6 sm:px-6 md:px-8 lg:flex lg:w-1/2 lg:flex-col lg:justify-between lg:px-16 lg:py-14">
    <div>
        <div class="mb-7">
            <img
                src="{{ asset('assets/logo/gintara.svg') }}"
                alt="GINTARA.NET"
                class="h-auto w-32 sm:w-40 md:w-44 lg:w-52 object-contain"
            >
        </div>
    </div>


                <h1 class="max-w-full sm:max-w-md text-[22px] sm:text-[26px] lg:text-[34px] font-extrabold leading-tight text-slate-900">
                    Satu portal untuk mengelola
                    <span class="bg-gradient-to-r from-sky-400 to-blue-500 bg-clip-text text-transparent">
                        operasional Gintara.Net
                    </span>.
                </h1>

                <p class="mt-3 max-w-full sm:max-w-sm text-[13px] sm:text-[14px] leading-relaxed text-slate-500">
                    Akses dashboard management, absensi, PKL/Magang, sertifikat, inventori, dan
                    laporan internal dalam satu sistem yang aman dan terintegrasi.
                </p>

                {{-- Signature: activity grid pulsing in sequence --}}
                <div class="hidden lg:grid room-grid mt-7 max-w-xs" aria-hidden="true">
                    @for ($i = 0; $i < 18; $i++)
                        <div class="room-cell"></div>
                    @endfor
                </div>

                <div class="hidden lg:grid mt-8 grid-cols-2 gap-3 lg:mt-10 lg:max-w-md">
                <div class="auth-feature">
                    <span class="auth-feature-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                    </span>
                    <div>
                        <h3>Management System</h3>
                        <p>Data operasional, karyawan, dashboard, dan laporan internal.</p>
                    </div>
                </div>

                <div class="auth-feature">
                    <span class="auth-feature-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"/></svg>
                    </span>
                    <div>
                        <h3>Internship Portal</h3>
                        <p>Pendaftaran, verifikasi, penempatan, dan sertifikat PKL/Magang.</p>
                    </div>
                </div>

                <div class="auth-feature">
                    <span class="auth-feature-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </span>
                    <div>
                        <h3>Attendance</h3>
                        <p>Rekap absensi GPS + selfie untuk karyawan dan peserta PKL.</p>
                    </div>
                </div>

                <div class="auth-feature">
                    <span class="auth-feature-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7M8 7h9v9"/></svg>
                    </span>
                    <div>
                        <h3>Secure Access</h3>
                        <p>Login berbasis role agar akses data tetap aman dan terkontrol.</p>
                    </div>
                </div>
            </div>
        </aside>

        {{-- RIGHT: login form --}}
        <section class="relative z-10 flex items-center justify-center w-full px-4 sm:px-6 md:px-8 pb-8 lg:w-1/2 lg:bg-white lg:px-14 lg:py-14">
            <div class="auth-card w-full">
                <span class="auth-eyebrow">
                    <span class="auth-eyebrow-dot"></span>
                    Gintara.Net Secure Portal
                </span>

                <h2 class="auth-title mt-4">Masuk ke akun Anda</h2>
                <p class="auth-subtitle">
                    Gunakan akun yang telah terdaftar untuk mengakses Portal Management atau
                    Portal PKL/Magang Gintara.Net.
                </p>

                @if (session('status'))
                    <div class="auth-status mt-5">{{ session('status') }}</div>
                @endif

                @error('device')
                    <div class="auth-status mt-5" style="background:#fee2e2;color:#dc2626;">
                        {{ $message }}
                    </div>
                @enderror

                <form method="POST" action="{{ route('login') }}" id="loginForm" class="mt-6" novalidate>
                    @csrf

                    <input type="hidden" name="device_fingerprint" id="device_fingerprint" value="">

                    <div class="mb-4" data-field>
                        <label for="username">Username</label>
                        <div class="auth-input-wrap">
                            <span class="auth-input-icon">@</span>
                            <input
                                id="username"
                                type="text"
                                name="username"
                                value="{{ old('username') }}" required autofocus autocomplete="username"
                                placeholder="Masukkan username">
                        </div>
                        <p class="auth-error-text {{ $errors->has('username') ? '' : 'hidden' }}">
                            {{ $errors->first('username') }}
                        </p>
                    </div>

                    <div class="mb-3" data-field>
                        <label class="auth-label" for="password">Password</label>
                        <div class="auth-input-wrap">
                            <input
                                class="auth-input"
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan password">

                            <button
                                type="button"
                                class="auth-toggle-password"
                                data-toggle-password="password">
                                Lihat
                            </button>
                        </div>
                        <p class="auth-error-text {{ $errors->has('password') ? '' : 'hidden' }}" data-error-for="password">
                            {{ $errors->first('password') }}
                        </p>
                    </div>

                    <div class="auth-row mb-6 mt-1">
                        <label class="auth-remember" for="remember">
                            <input id="remember" type="checkbox" name="remember">
                            Ingat saya
                        </label>

                        @if (Route::has('password.request'))
                            <a class="auth-link" href="{{ route('password.request') }}">Lupa password? Hubungi Admin</a>
                        @else
                            <span class="auth-link cursor-default hover:no-underline">Lupa password? Hubungi Admin</span>
                        @endif
                    </div>

                    <button class="auth-submit" type="submit" id="loginButton">
                        <span>Masuk Sekarang</span>
                    </button>
                </form>

                <div class="mt-7 flex items-center justify-between border-t border-white/10 pt-5 lg:border-slate-100">
                    <p class="auth-footer-text leading-relaxed">
                        © {{ date('Y') }} PT. DIGITAL NUSANTARA NETWORKS<br>
                        Gintara.Net — Connect More, Empower All rights reserved.
                    </p>
                    <span class="auth-secure-badge shrink-0">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg>
                        Secure Login
                    </span>
                </div>
            </div>
        </section>
    </main>
</x-auth-layout>
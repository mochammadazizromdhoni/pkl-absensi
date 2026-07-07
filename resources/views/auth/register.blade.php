<x-guest-layout>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --text: #172033;
            --muted: #6b7280;
            --border: #e5e7eb;
            --bg: #f8fafc;
        }

```
    * { box-sizing: border-box; }

    .auth-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        background:
            radial-gradient(circle at top right, #dbeafe 0, transparent 28%),
            radial-gradient(circle at bottom left, #e0e7ff 0, transparent 28%),
            var(--bg);
        font-family: Inter, ui-sans-serif, system-ui, sans-serif;
    }

    .auth-card {
        width: 100%;
        max-width: 440px;
        padding: 38px;
        background: #fff;
        border: 1px solid rgba(229, 231, 235, .9);
        border-radius: 20px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, .10);
        animation: slideUp .45s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(16px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .brand {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        margin-bottom: 20px;
        border-radius: 14px;
        color: white;
        font-size: 20px;
        font-weight: 800;
        background: var(--primary);
    }

    .auth-card h1 {
        margin: 0;
        color: var(--text);
        font-size: 28px;
        letter-spacing: -.7px;
    }

    .subtitle {
        margin: 9px 0 28px;
        color: var(--muted);
        font-size: 14px;
        line-height: 1.6;
    }

    .form-group { margin-bottom: 17px; }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #374151;
        font-size: 13px;
        font-weight: 650;
    }

    .input-wrap { position: relative; }

    .form-input {
        width: 100%;
        height: 48px;
        padding: 0 45px 0 14px;
        border: 1px solid var(--border);
        border-radius: 11px;
        outline: none;
        color: var(--text);
        font-size: 14px;
        transition: .2s ease;
    }

    .form-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, .12);
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        border: 0;
        background: transparent;
        color: var(--muted);
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
    }

    .strength {
        display: flex;
        gap: 5px;
        margin-top: 9px;
    }

    .strength span {
        flex: 1;
        height: 4px;
        border-radius: 8px;
        background: #e5e7eb;
        transition: .2s ease;
    }

    .strength-text {
        display: block;
        min-height: 16px;
        margin-top: 5px;
        color: var(--muted);
        font-size: 11px;
    }

    .submit-btn {
        width: 100%;
        height: 49px;
        margin-top: 8px;
        border: 0;
        border-radius: 11px;
        background: var(--primary);
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        font-weight: 700;
        transition: .2s ease;
    }

    .submit-btn:hover { background: var(--primary-dark); transform: translateY(-1px); }
    .submit-btn:disabled { opacity: .7; cursor: not-allowed; transform: none; }

    .bottom-text {
        margin: 24px 0 0;
        text-align: center;
        color: var(--muted);
        font-size: 13px;
    }

    .link {
        color: var(--primary);
        text-decoration: none;
        font-size: 13px;
        font-weight: 650;
    }

    .link:hover { text-decoration: underline; }

    .error-text {
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    .match-text {
        display: block;
        min-height: 16px;
        margin-top: 5px;
        font-size: 11px;
    }

    @media (max-width: 480px) {
        .auth-page { padding: 16px; }
        .auth-card { padding: 28px 22px; border-radius: 16px; }
    }
</style>

<main class="auth-page">
    <section class="auth-card">
        <div class="brand">R</div>
        <h1>Buat akun baru</h1>
        <p class="subtitle">Daftar untuk mulai menggunakan aplikasi.</p>

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Nama lengkap</label>
                <input class="form-input" id="name" type="text" name="name"
                    value="{{ old('name') }}" required autofocus autocomplete="name"
                    placeholder="Masukkan nama lengkap">
                @error('name')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input class="form-input" id="email" type="email" name="email"
                    value="{{ old('email') }}" required autocomplete="username"
                    placeholder="nama@email.com">
                @error('email')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-wrap">
                    <input class="form-input" id="password" type="password" name="password"
                        required autocomplete="new-password" placeholder="Minimal 8 karakter">
                    <button type="button" class="toggle-password" data-target="password">Lihat</button>
                </div>

                <div class="strength" id="strengthBars">
                    <span></span><span></span><span></span><span></span>
                </div>
                <small class="strength-text" id="strengthText"></small>

                @error('password')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Konfirmasi password</label>
                <div class="input-wrap">
                    <input class="form-input" id="password_confirmation" type="password"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Ulangi password">
                    <button type="button" class="toggle-password" data-target="password_confirmation">Lihat</button>
                </div>
                <small class="match-text" id="matchText"></small>

                @error('password_confirmation')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <button class="submit-btn" type="submit" id="registerButton">
                <span>Daftar</span>
            </button>
        </form>

        <p class="bottom-text">
            Sudah punya akun?
            <a class="link" href="{{ route('login') }}">Masuk di sini</a>
        </p>
    </section>
</main>

<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.target);
            const isPassword = input.type === 'password';

            input.type = isPassword ? 'text' : 'password';
            this.textContent = isPassword ? 'Sembunyi' : 'Lihat';
        });
    });

    const password = document.getElementById('password');
    const confirmation = document.getElementById('password_confirmation');
    const strengthBars = document.querySelectorAll('#strengthBars span');
    const strengthText = document.getElementById('strengthText');
    const matchText = document.getElementById('matchText');

    password.addEventListener('input', function () {
        let score = 0;
        const value = this.value;

        if (value.length >= 8) score++;
        if (/[A-Z]/.test(value)) score++;
        if (/[0-9]/.test(value)) score++;
        if (/[^A-Za-z0-9]/.test(value)) score++;

        const labels = ['', 'Lemah', 'Cukup', 'Kuat', 'Sangat kuat'];
        const colors = ['', '#ef4444', '#f59e0b', '#3b82f6', '#22c55e'];

        strengthBars.forEach((bar, index) => {
            bar.style.background = index < score ? colors[score] : '#e5e7eb';
        });

        strengthText.textContent = value ? `Kekuatan password: ${labels[score]}` : '';
        strengthText.style.color = colors[score] || '#6b7280';

        checkPasswordMatch();
    });

    confirmation.addEventListener('input', checkPasswordMatch);

    function checkPasswordMatch() {
        if (!confirmation.value) {
            matchText.textContent = '';
            return;
        }

        if (password.value === confirmation.value) {
            matchText.textContent = '✓ Password cocok';
            matchText.style.color = '#16a34a';
        } else {
            matchText.textContent = '✕ Password belum cocok';
            matchText.style.color = '#dc2626';
        }
    }

    document.getElementById('registerForm').addEventListener('submit', function (event) {
        if (password.value !== confirmation.value) {
            event.preventDefault();
            matchText.textContent = '✕ Password belum cocok';
            matchText.style.color = '#dc2626';
            confirmation.focus();
            return;
        }

        const button = document.getElementById('registerButton');
        button.disabled = true;
        button.querySelector('span').textContent = 'Mendaftarkan...';
    });
</script>
```

</x-guest-layout>

/**
 * RuangKita — Auth Login interactivity
 * Loaded via Vite as a separate entry so the auth pages stay lightweight.
 */

/**
 * Compute a stable browser/device fingerprint (SHA-256 hex string).
 * - Uses the Web Crypto API, so nothing needs to be installed.
 * - Version numbers are stripped from the User-Agent so a routine Chrome/
 *   Firefox auto-update doesn't accidentally trip the device lock.
 * - This is NOT tamper-proof against someone editing DevTools by hand —
 *   it stops casual browser/device switching, not a determined attacker.
 */
async function computeDeviceFingerprint() {
    const nav = window.navigator;
    const scr = window.screen;

    const normalizedUA = nav.userAgent.replace(/\/[\d.]+/g, '');

    let canvasSignature = 'no-canvas';
    try {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        ctx.textBaseline = 'top';
        ctx.font = '14px Arial';
        ctx.fillText('rk-device-fingerprint', 2, 2);
        canvasSignature = canvas.toDataURL();
    } catch (error) {
        // Canvas blocked (privacy mode, old browser, etc.) — fall back silently.
    }

    const raw = [
        normalizedUA,
        nav.language,
        nav.platform,
        nav.hardwareConcurrency || '',
        `${scr.width}x${scr.height}x${scr.colorDepth}`,
        Intl.DateTimeFormat().resolvedOptions().timeZone,
        canvasSignature,
    ].join('###');

    const encoded = new TextEncoder().encode(raw);
    const hashBuffer = await window.crypto.subtle.digest('SHA-256', encoded);

    return Array.from(new Uint8Array(hashBuffer))
        .map((byte) => byte.toString(16).padStart(2, '0'))
        .join('');
}

function initDeviceFingerprint() {
    const field = document.getElementById('device_fingerprint');
    const form = document.getElementById('loginForm');
    if (!field || !form) return;

    const ready = computeDeviceFingerprint()
        .then((hash) => {
            field.value = hash;
        })
        .catch(() => {
            // Web Crypto unavailable (very old browser) — leave field empty,
            // server-side validation will reject with a friendly message.
        });

    // Guard: if the person submits before the async hash finishes, hold the
    // submit, wait for it, then submit for real instead of sending it empty.
    form.addEventListener('submit', function guard(event) {
        if (field.value) return;

        event.preventDefault();
        ready.then(() => {
            form.removeEventListener('submit', guard);
            if (form.requestSubmit) {
                form.requestSubmit();
            } else {
                form.submit();
            }
        });
    });
}

function initPasswordToggles() {
    document.querySelectorAll('[data-toggle-password]').forEach((button) => {
        button.addEventListener('click', () => {
            const input = document.getElementById(button.dataset.togglePassword);
            if (!input) return;

            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            button.textContent = isHidden ? 'Sembunyi' : 'Lihat';
        });
    });
}

function setFieldError(input, message) {
    const wrap = input.closest('[data-field]');
    if (!wrap) return;

    const errorEl = wrap.querySelector('[data-error-for]');
    input.classList.toggle('is-invalid', Boolean(message));

    if (errorEl) {
        errorEl.textContent = message || '';
        errorEl.classList.toggle('hidden', !message);
    }
}

function validateLoginForm(form) {
    let isValid = true;

    const email = form.querySelector('#email');
    const password = form.querySelector('#password');

    if (email) {
        const value = email.value.trim();

        if (!value) {
            setFieldError(email, 'Username wajib diisi.');
            isValid = false;
        } else {
            setFieldError(email, '');
        }
    }

    if (password) {
        if (!password.value) {
            setFieldError(password, 'Password wajib diisi.');
            isValid = false;
        } else {
            setFieldError(password, '');
        }
    }

    return isValid;
}

function initFormSubmission() {
    const form = document.getElementById('loginForm');
    if (!form) return;

    const button = document.getElementById('loginButton');
    const buttonLabel = button ? button.querySelector('span') : null;

    // Clear inline error state as the person types.
    form.querySelectorAll('input').forEach((input) => {
        input.addEventListener('input', () => setFieldError(input, ''));
    });

    form.addEventListener('submit', (event) => {
        if (!validateLoginForm(form)) {
            event.preventDefault();
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) firstInvalid.focus();
            return;
        }

        if (button) {
            button.disabled = true;
            if (buttonLabel) buttonLabel.textContent = 'Memproses...';
        }
    });
}

function initRippleEffect() {
    const button = document.getElementById('loginButton');
    if (!button) return;

    button.addEventListener('click', (event) => {
        const rect = button.getBoundingClientRect();
        const ripple = document.createElement('span');
        const size = Math.max(rect.width, rect.height);

        ripple.className = 'ripple';
        ripple.style.width = ripple.style.height = `${size}px`;
        ripple.style.left = `${event.clientX - rect.left - size / 2}px`;
        ripple.style.top = `${event.clientY - rect.top - size / 2}px`;

        button.appendChild(ripple);
        window.setTimeout(() => ripple.remove(), 650);
    });
}

function initBlobParallax() {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isDesktop = window.matchMedia('(min-width: 1024px)').matches;
    if (reduceMotion || !isDesktop) return;

    const blobs = document.querySelectorAll('.auth-blob');
    if (!blobs.length) return;

    const shell = document.querySelector('.auth-shell');
    if (!shell) return;

    shell.addEventListener('mousemove', (event) => {
        const { innerWidth, innerHeight } = window;
        const relX = (event.clientX / innerWidth - 0.5) * 2;
        const relY = (event.clientY / innerHeight - 0.5) * 2;

        blobs.forEach((blob, index) => {
            const strength = index % 2 === 0 ? 14 : -10;
            blob.style.transform = `translate(${relX * strength}px, ${relY * strength}px)`;
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initPasswordToggles();
    initFormSubmission();
    initRippleEffect();
    initBlobParallax();
    initDeviceFingerprint();
});
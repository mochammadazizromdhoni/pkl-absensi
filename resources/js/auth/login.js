/**
 * RuangKita — Auth Login interactivity
 * Loaded via Vite as a separate entry so the auth pages stay lightweight.
 */

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
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!value) {
            setFieldError(email, 'Email wajib diisi.');
            isValid = false;
        } else if (!emailPattern.test(value)) {
            setFieldError(email, 'Format email tidak valid.');
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
});
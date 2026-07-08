<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;

// Landing Page
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Dashboard Sesuai Role
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        switch ($user->role) {
            case 'super_admin':
            case 'admin':
                return redirect()->route('admin.dashboard');

            case 'pkl':
                return redirect()->route('pkl.dashboard');

            case 'sales':
                return redirect()->route('sales.dashboard');

            case 'teknisi':
                return redirect()->route('teknisi.dashboard');

            default:
                abort(403);
        }
    })->name('dashboard');
});

// Dashboard Admin
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');
        
        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');
        
        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');
        
        Route::get('/users/{user}', [UserController::class, 'show'])
            ->name('users.show');
        
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');
        
        Route::put('/users/{user}', [UserController::class, 'update'])
            ->name('users.update');
        
        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');
});

// Dashboard PKL (Diperbarui)
Route::middleware(['auth', 'pkl'])->group(function () {

    // Halaman Utama Dashboard PKL
    Route::get('/absensi/pkl', function () {
        // Menyesuaikan folder PKL sesuai foto struktur direktori Anda
        return view('absensi.PKL.dashboard'); 
    })->name('pkl.dashboard');

    // Halaman Menu Absensi (Tempat Kamera Selfie)
    Route::get('/absensi/pkl/kamera', function () {
        // Mengarah tepat ke file absensi.blade.php di dalam folder PKL Anda
        return view('absensi.PKL.absensi'); 
    })->name('pkl.absensi');

});

// Dashboard Sales
Route::middleware(['auth', 'sales'])->group(function () {
    Route::get('/absensi/sales', function () {
        return view('absensi.sales.dashboard');
    })->name('sales.dashboard');
});

// Dashboard Teknisi
Route::middleware(['auth', 'teknisi'])->group(function () {
    Route::get('/absensi/teknisi', function () {
        return view('absensi.teknisi.dashboard');
    })->name('teknisi.dashboard');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// landing Page

Route::get('/', function () {

    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');

});
//Dashboard Sesuai Role

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
//dashboard Admin

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});
//dashboard PKL

Route::middleware(['auth', 'pkl'])->group(function () {

    Route::get('/absensi/pkl', function () {
        return view('absensi.pkl.dashboard');
    })->name('pkl.dashboard');

});
//dashboard Sales

Route::middleware(['auth', 'sales'])->group(function () {

    Route::get('/absensi/sales', function () {
        return view('absensi.sales.dashboard');
    })->name('sales.dashboard');

});
//dashboard Teknisi

Route::middleware(['auth', 'teknisi'])->group(function () {

    Route::get('/absensi/teknisi', function () {
        return view('absensi.teknisi.dashboard');
    })->name('teknisi.dashboard');

});
//Profile

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        if(auth()->user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        }

        if(auth()->user()->role == 'pkl'){
            return redirect()->route('pkl.dashboard');
        }

        if(auth()->user()->role == 'sales'){
            return redirect()->route('sales.dashboard');
        }

        abort(403);

    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/pkl/dashboard', function () {
        return view('pkl.dashboard');
    })->name('pkl.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
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


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard',
        [DashboardController::class,'index']
    )->name('dashboard');


    Route::get('/create',
        [DashboardController::class,'create']
    )->name('create');


    Route::post('/store',
        [DashboardController::class,'store']
    )->name('store');


    Route::get('/edit/{id}',
        [DashboardController::class,'edit']
    )->name('edit');


    Route::put('/update/{id}',
        [DashboardController::class,'update']
    )->name('update');


    Route::delete('/delete/{id}',
        [DashboardController::class,'destroy']
    )->name('delete');

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
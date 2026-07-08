<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        $user = auth()->user();

        switch ($user->role) {
            case 'admin':
            case 'super_admin':
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
Route::middleware(['auth', 'pkl'])->group(function () {

    Route::get('/pkl/dashboard', function () {
        return view('pkl.dashboard');
    })->name('pkl.dashboard');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'sales'])->group(function () {

    Route::get('/sales/dashboard', function () {
        return view('sales.dashboard');
    })->name('sales.dashboard');

});

Route::middleware(['auth', 'teknisi'])->group(function () {

    Route::get('/teknisi/dashboard', function () {
        return view('teknisi.dashboard');
    })->name('teknisi.dashboard');

});

require __DIR__.'/auth.php';
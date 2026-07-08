<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Daftar semua user (Kelola Pengguna).
     * TODO: sesuaikan dengan tampilan/kolom yang kamu mau, ini masih dasar.
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Detail satu user.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // TODO: tambahkan create(), store(), edit(), update(), destroy()
    // sesuai kebutuhan Kelola Pengguna kamu (belum saya buatkan karena
    // belum tahu field/role apa saja yang mau diatur di form-nya).

    /**
     * Reset device lock milik user tertentu. Khusus admin.
     * Dipanggil dari tombol "Reset Perangkat" di halaman show/edit user.
     */
    public function resetDevice(User $user): RedirectResponse
    {
        $user->forceFill([
            'device_id' => null,
            'device_locked_at' => null,
            'device_reset_at' => now(),
        ])->save();

        return back()->with('status', "Perangkat milik {$user->name} berhasil direset. Silakan minta user login ulang.");
    }
}
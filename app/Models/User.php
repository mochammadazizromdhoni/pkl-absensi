<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
// NOTE: device_id / device_locked_at / device_reset_at sengaja TIDAK dimasukkan ke
// Fillable — kolom ini hanya boleh diubah lewat AuthenticatedSessionController
// (saat login) atau UserController::resetDevice() (oleh admin), bukan dari input user.
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Role yang valid untuk Gintara.Net.
     */
    public const ROLES = ['admin', 'sales', 'teknisi', 'pkl'];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'device_locked_at' => 'datetime',
            'device_reset_at' => 'datetime',
        ];
    }
}
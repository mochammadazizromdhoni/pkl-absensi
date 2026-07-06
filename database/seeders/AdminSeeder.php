<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gintara.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'pkl@gintara.com'],
            [
                'name' => 'Siswa PKL',
                'password' => Hash::make('pkl12345'),
                'role' => 'pkl',
            ]
        );

        User::firstOrCreate(
            ['email' => 'sales@gintara.com'],
            [
                'name' => 'Sales',
                'password' => Hash::make('sales123'),
                'role' => 'sales',
            ]
        );

        User::firstOrCreate(
            ['email' => 'teknisi@gintara.com'],
            [
                'name' => 'Teknisi',
                'password' => Hash::make('teknisi123'),
                'role' => 'teknisi',
            ]
        );
    }
}
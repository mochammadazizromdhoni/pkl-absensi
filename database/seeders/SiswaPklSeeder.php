<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaPklSeeder extends Seeder
{
    /**
     * Jalankan data akun siswa PKL.
     */
    public function run(): void
    {
        $siswaPkl = [
            [
                'name'     => 'Bintang',
                'username' => 'bintang',
                'email'    => 'bintang@pkl.local',
                'role'     => 'pkl',
            ],
            [
                'name'     => 'Aziz',
                'username' => 'aziz',
                'email'    => 'aziz@pkl.local',
                'role'     => 'pkl',
            ],
            [
                'name'     => 'Devan',
                'username' => 'devan',
                'email'    => 'devan@pkl.local',
                'role'     => 'pkl',
            ],
            [
                'name'     => 'Prima',
                'username' => 'prima',
                'email'    => 'prima@pkl.local',
                'role'     => 'pkl',
            ],
        ];

        foreach ($siswaPkl as $siswa) { 
            User::firstOrCreate(
                ['username' => $siswa['username']],
                [
                    'name'     => $siswa['name'],
                    'email'    => $siswa['email'],
                    'password' => Hash::make('pkl12345'),
                    'role'     => $siswa['role'],
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaPklSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswaPkl = [
            [
                'name' => 'Bintang',
                'username' => 'bintang',
                'role' => 'pkl',
            ],
            [
                'name' => 'Aziz',
                'username' => 'aziz',
                'role' => 'pkl',
            ],
            [
                'name' => 'Devan',
                'username' => 'devan',
                'role' => 'pkl',
            ],
            [
                'name' => 'Prima',
                'username' => 'prima',
                'role' => 'pkl',
            ],
        ];

        foreach ($siswaPkl as $siswa) {
            User::firstOrCreate(
                ['username' => $siswa['username']],
                [
                    'name' => $siswa['name'],
                    'password' => Hash::make('pkl12345'),
                    'role' => $siswa['role'],
                ]
            );
        }
    }
}

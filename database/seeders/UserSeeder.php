<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin',
            'siswa',
            'wali_kelas',
            'waka_kesiswaan',
            'guru_penyeleksi',
            'kepsek'
        ];

        foreach ($roles as $role) {
            User::create([
                'name' => ucfirst($role),
                'email' => $role . '@gmail.com',
                'password' => Hash::make('password'),
                'role' => $role
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'nando@gmail.com'],
            [
                'name' => 'Nando Admin',
                'role' => 'admin',
                'password' => Hash::make('123456789'), // Gantilah dengan password yang sesuai
            ]
        )->assignRole('admin');
    }
}

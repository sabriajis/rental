<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // User::create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password123'), // Gantilah dengan password yang sesuai

        // ]);

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            // Tambahkan seeder lain di sini
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin default untuk pengujian lokal
        User::updateOrCreate(
            ['email' => 'admin@dermo.kelurahan.id'],
            [
                'name' => 'Admin Kelurahan Dermo',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $this->call([
            BusinessCategorySeeder::class,
            UmkmSeeder::class,
        ]);
    }
}

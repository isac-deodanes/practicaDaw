<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@demo.com'],
            [
                'name' => 'Administrador Demo',
                'password' => Hash::make('12345678'),
                'rol' => 'administrador',
            ]
        );
    }
}

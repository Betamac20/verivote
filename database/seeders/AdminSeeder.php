<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@umak.edu.ph',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'id_number' => 'N/A',
            'department' => 'N/A',
            'year_level' => 'N/A',
            'gender' => 'N/A',
            'user_type' => 'N/A',
        ])->assignRole('admin');

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User',
            'code' => 'USR001',
            'position' => 'Purchaser',
            'company_name' => 'PT INDO MERDEKA',
            'npwp' => '1028301920123',
            'npwp_photo' => '',
            'address' => 'Jl Wono 21',
            'address_2' => 'Jl Wono 34',
            'phone' => '086361781821',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'password' => 'password',
            'remember_token' => Str::random(10),
        ]);

        User::create( [
            'name' => 'User',
            'code' => 'USR002',
            'position' => 'Sales',
            'company_name' => 'PT INDO MERDEKA',
            'npwp' => '1028301920123',
            'npwp_photo' => '',
            'address' => 'Jl Wono 21',
            'address_2' => 'Jl Wono 34',
            'phone' => '086361781821',
            'email' => 'user2@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'password' => 'password',
            'remember_token' => Str::random(10),
        ]);
    }
}

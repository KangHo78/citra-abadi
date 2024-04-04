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
            'code' => null,
            'position' => null,
            'company_name' => null,
            'npwp' => null,
            'npwp_photo' => null,
            'address' => null,
            'address_2' => null,
            'phone' => null,
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'password' => 'password',
            'remember_token' => Str::random(10),
        ]);

        User::create( [
            'name' => 'User',
            'code' => 'USR001',
            'position' => '1',
            'company_name' => '1',
            'npwp' => '1',
            'npwp_photo' => '1',
            'address' => '1',
            'address_2' => '1',
            'phone' => '1',
            'email' => 'user2@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'password' => 'password',
            'remember_token' => Str::random(10),
        ]);
    }
}

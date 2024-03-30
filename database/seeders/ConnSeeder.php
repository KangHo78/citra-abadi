<?php

namespace Database\Seeders;

use App\Models\Conn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conn::create([
            'name' => 'BW',
        ]);
        Conn::create([
            'name' => 'BSPT',
        ]);
        
    }
}

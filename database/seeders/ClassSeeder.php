<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classes::create([
            'name' => 'Socket',
        ]);
        Classes::create([
            'name' => 'Elbow 90',
        ]);
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'name' => 'A234',
        ]);
        Material::create([
            'name' => 'MALLEABLE IRON',
        ]);
        
    }
}

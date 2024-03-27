<?php

namespace Database\Seeders;

use App\Models\Spec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Spec::create([
            'name' => 'Spec A',
        ]);
        Spec::create([
            'name' => 'Spec B',
        ]);
        
    }
}

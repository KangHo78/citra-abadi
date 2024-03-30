<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'PIPA',
            'image' => null,
            'parent_category_id' => 1,
        ]);
        Category::create([
            'name' => 'FLANGE',
            'parent_category_id' => 2,
        ]);
        Category::create([
            'name' => 'FITTING',
            'parent_category_id' => 2,
        ]);
        Category::create([
            'name' => 'GASKET',
            'parent_category_id' => 2,
        ]);
        Category::create([
            'name' => 'VALVE',
            'parent_category_id' => 2,
        ]);
    }
}

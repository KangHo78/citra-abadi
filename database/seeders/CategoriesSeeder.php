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
            'name' => 'Socket 2',
            'image' => null,
            'parent_category_id' => 1
        ]);
        Category::create([
            'name' => 'Elbow 90',
            'image' => null,
            'parent_category_id' => 1
        ]);
        
    }
}

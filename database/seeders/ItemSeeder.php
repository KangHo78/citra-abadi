<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'ELBOW 90',
            'sku' => 'EL2839',
            'description' => 'Desc',
            'brand_id' => 1,
            'category_id' => 1,
            'subcategory_id_1' => 1,
            'subcategory_id_2' => 1,
            'subcategory_id_3' => 1,
            'subcategory_id_4' => 1,
            'subcategory_id_5' => 1,
            'subcategory_id_6' => 1,
            'photos' => 1,

        ]);

        Item::create([
            'name' => 'Socket',
            'sku' => 'SKU2',
            'description' => 'Desc',
            'brand_id' => 1,
            'category_id' => 1,
            'subcategory_id_1' => 1,
            'subcategory_id_2' => 1,
            'subcategory_id_3' => 1,
            'subcategory_id_4' => 1,
            'subcategory_id_5' => 1,
            'subcategory_id_6' => 1,
            'photos' => 1,

        ]);
        
        
    }
}

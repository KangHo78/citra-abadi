<?php

namespace Database\Seeders;

use App\Models\ItemDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        ItemDetail::create([
            'item_id' => 1,
            'spec_id' => 1,
            'material_id' => 1,
            'class_id' => 1,
            'conn_id' => 1,
            'size_id' => 1,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'spec_id' => 1,
            'material_id' => 1,
            'class_id' => 1,
            'conn_id' => 1,
            'size_id' => 1,
        ]);
       
        
    }
}

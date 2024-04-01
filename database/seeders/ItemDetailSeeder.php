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
            'sku' => 'EL28391',
            'spec_id' => 1,
            'material_id' => 1,
            'class_id' => 1,
            'conn_id' => 1,
            'size_id' => 1,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL28392',
            'spec_id' => 1,
            'material_id' => 1,
            'class_id' => 1,
            'conn_id' => 1,
            'size_id' => 1,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL28393',
            'spec_id' => 2,
            'material_id' => 2,
            'class_id' => 2,
            'conn_id' => 2,
            'size_id' => 2,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL28394',
            'spec_id' => 2,
            'material_id' => 2,
            'class_id' => 2,
            'conn_id' => 2,
            'size_id' => 2,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL28395',
            'spec_id' => 2,
            'material_id' => 2,
            'class_id' => 2,
            'conn_id' => 2,
            'size_id' => 2,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL28396',
            'spec_id' => 2,
            'material_id' => 2,
            'class_id' => 2,
            'conn_id' => 2,
            'size_id' => 2,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL28397',
            'spec_id' => 2,
            'material_id' => 2,
            'class_id' => 1,
            'conn_id' => 2,
            'size_id' => 1,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL28398',
            'spec_id' => 2,
            'material_id' => 2,
            'class_id' => 1,
            'conn_id' => 1,
            'size_id' => 2,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL28399',
            'spec_id' => 2,
            'material_id' => 2,
            'class_id' => 1,
            'conn_id' => 2,
            'size_id' => 1,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL283910',
            'spec_id' => 1,
            'material_id' => 2,
            'class_id' => 2,
            'conn_id' => 1,
            'size_id' => 2,
        ]);

        ItemDetail::create([
            'item_id' => 1,
            'sku' => 'EL283911',
            'spec_id' => 1,
            'material_id' => 1,
            'class_id' => 2,
            'conn_id' => 1,
            'size_id' => 1,
        ]);
       
        
    }
}

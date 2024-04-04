<?php

namespace Database\Seeders;

use App\Models\EnquiryDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnquiryDetailSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EnquiryDetail::create([
            'enquiry_id' => 1,
            'item_id' => 1,
            'item_detail_id' => 1,
            'item_price' => 10000,
            'item_quantity' => 2,
            'description' => 'test'
        ]);

        EnquiryDetail::create([
            'enquiry_id' => 2,
            'item_id' => 1,
            'item_detail_id' => 1,
            'item_price' => 10000,
            'item_quantity' => 2,
            'description' => ''
        ]);

        EnquiryDetail::create([
            'enquiry_id' => 1,
            'item_id' => 1,
            'item_detail_id' => 1,
            'item_price' => 10000,
            'item_quantity' => 2,
            'description' => ''
        ]);
        
        
    }
}

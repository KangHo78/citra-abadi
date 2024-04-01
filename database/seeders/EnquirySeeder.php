<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnquirySeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enquiry::create([
            'code' => 'ENQ2403300001',
            'date' => now(),
            'desc' => 'Desc',
            'status' => 1,
            'customer_id' => 1,
            'discount' => 10000,
            'discount_type' => 1,
            'grand_total' => 10000,
        ]);

        Enquiry::create([
            'code' => 'ENQ2403300002',
            'date' => now(),
            'desc' => 'Desc 2',
            'status' => 2,
            'customer_id' => 1,
            'discount' => 5,
            'discount_type' => 2,
            'grand_total' => 100000,
        ]);
        
        
    }
}

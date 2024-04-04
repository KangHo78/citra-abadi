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
            'price' => 20000,
            'discount' => 10000,
            'grand_total' => 10000,
        ]);

        Enquiry::create([
            'code' => 'ENQ2403300002',
            'date' => now(),
            'desc' => 'Desc 2',
            'status' => 2,
            'customer_id' => 1,
            'price' => 10000,
            'discount' => 0,
            'grand_total' => 10000,
        ]);
        
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Spec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'body' => 'CS',
            'header' => 'CS',
            'image1' => NULL,
            'image2' => NULL,
            'header_homepage' => 'Koneksi yang Aman, Layanan yang Tak Terkalahkan',
            'body_homepage' => 'Perusahaan pipa kami adalah pilihan utama bagi klien yang mengutamakan kualitas, keandalan, dan inovasi dalam infrastruktur.',
        ]);
        
    }
}

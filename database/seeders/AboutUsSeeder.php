<?php

namespace Database\Seeders;

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
        Spec::create([
            'body' => 'CS',
            'header' => 'CS',
            'image1' => NULL,
            'image2' => NULL,
            'body_homepage' => 'Koneksi yang Aman, Layanan yang Tak Terkalahkan',
            'header_homepage' => 'Perusahaan pipa kami adalah pilihan utama bagi klien yang mengutamakan kualitas, keandalan, dan inovasi dalam infrastruktur.',
        ]);
        
    }
}

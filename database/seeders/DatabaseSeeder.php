<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ 
            // untuk semua
            UserSeeder::class,
            CategoriesSeeder::class,
            BrandSeeder::class,
            ClassSeeder::class,
            ConnSeeder::class,
            MaterialSeeder::class,
            SizeSeeder::class,
            SpecSeeder::class,
            ItemSeeder::class,
            ItemDetailSeeder::class,
        ]);

        // $this->call([
            // UserSeeder::class
            // SizeSeeder::class,
            // SpecSeeder::class,
            // ItemSeeder::class,
            // ItemDetailSeeder::class,

        // ]);

        // $this->call([
        //     // MaterialSeeder::class,
        //     SizeSeeder::class,
        //     SpecSeeder::class,
        //     ItemSeeder::class,
        //     ItemDetailSeeder::class,

        // ]);
    }
}

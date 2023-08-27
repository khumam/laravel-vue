<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Faker\Factory as faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();

        for ($i=0; $i < 20; $i++) { 
            
            $catalog = New Catalog;

            $catalog->name = $faker->name();

            $catalog->save();
        }
    }
}

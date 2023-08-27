<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();

        for ($i=0; $i < 20; $i++) { 
            
            $book = New Book;

            $book->isbn = $faker->randomNumber(9);
            $book->title = $faker->name();
            $book->year = rand(1990, 2015);

            $book->publisher_id = rand(1,20);
            $book->author_id = rand(1,20);
            $book->catalog_id = rand(1,20);

            $book->qty = rand(10,20);
            $book->price = rand(10000,200000);

            $book->save();
        }
    }
}

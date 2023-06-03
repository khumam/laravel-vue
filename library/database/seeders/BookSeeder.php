<?php

namespace Database\Seeders;
use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++){
            $book = new Book;

            $book->isbn = $faker->randomNumber(9);
            $book->title = $faker->sentence(3);
            $book->year = rand(2010,2021);
            $book->publisher_id = rand(1,5);
            $book->author_id = rand(1,20);
            $book->catalog_id = rand(1,7);
            $book->qty = rand(10,20);
            $book->price = rand(10000,100000);

            $book->save();
        }
    }
}

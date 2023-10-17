<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();

        for ($i=0; $i < 10; $i++) { 
            
            $transaction = New Transaction;

            $transaction->member_id = rand(1,19);
            $transaction->date_start = $faker->dateTimeBetween('-10 month', '+2 month');
            $transaction->date_end =  $faker->dateTimeBetween('-9 month', '+2 month');

            $transaction->save();
        }
    }
}

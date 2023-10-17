<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as faker;


class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = faker::create();

        for ($i=1; $i <= 10; $i++) { 
            
            $transactionDetail = New TransactionDetail;

            $transactionDetail->transaction_id = $i;
            $transactionDetail->book_id = rand(2,11);
            $transactionDetail->qty = rand(1,3);

            $transactionDetail->save();
        }
    }
}

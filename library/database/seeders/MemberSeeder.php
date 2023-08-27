<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();

        for ($i=0; $i < 20; $i++) { 
            
            $member = New Member;

            $member->name = $faker->name();
            $member->gender = rand(0, 1) === 0 ? 'L' : 'P';
            $member->phone_number = '0821'.$faker->randomNumber(8);
            $member->address = $faker->address();
            $member->email = $faker->email();

            $member->save();
        }
    }
}

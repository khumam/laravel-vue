<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Faker\Factory as faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();

        for ($i=0; $i < 20; $i++) { 
            
            $user = New User;
            $user->name = $faker->name();
            $user->email = $faker->email();
            $user->password = Hash::make('password');
            $user->member_id = $i+1;
            $user->email_verified_at = now();
            $user->remember_token = Str::random(10);

            $user->save();
        }
    }
}

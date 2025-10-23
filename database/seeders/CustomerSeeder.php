<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class CustomerSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        
        // Create 50 records
        for ($i = 0; $i < 50; $i++) {
            DB::table('customers')->insert([
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('##########'), // Generates a 10-digit number
                'dateOfBirth' => $faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'status' => $faker->boolean, // Generates 1 or 0
                'createdBy' => $faker->name,
                'created_at' => $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d H:i:s'),
                'updated_at' =>  $faker->dateTimeBetween('2020-01-01', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
    }


}

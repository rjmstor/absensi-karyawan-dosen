<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as faker;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i <= 100; $i++){
            DB::table('users')->insert([
                'username' => $faker->name, 
                'email' => $faker->email,
                'password' => bcrypt('12345'),
                'role_id' => $faker->randomElement([1, 2]),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}

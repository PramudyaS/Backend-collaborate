<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 5 ; $i++) { 
            User::create([
            'name'      =>  $faker->name,
            'email'     =>  $faker->email,
            'phone'     =>  '08123131129'.$i,
            'username'  =>  $faker->username,
            'password'  => Hash::make('prams123'),
            ]);
        }
           
    }
}

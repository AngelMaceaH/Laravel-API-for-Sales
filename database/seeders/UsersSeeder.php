<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 11 ; $i++) { 
            Users::create([
                'user'=>$faker->userName,
                'name'=>$faker->firstName,
                'lastname'=>$faker->lastName,
                'email'=>$faker->email,
                'password'=>$faker->password,
                'role'=>$faker->numberBetween(1,2),
                'status'=>$faker->numberBetween(1,2),
                'created_at'=>$faker->dateTimeBetween('-1 years', 'now')
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Faker
        $faker = Faker::create('pt_BR');

        //cria 10
        $quantidade = 10;

        for ($i = 0; $i < $quantidade; $i++) {
            User::create([
                'name' => $faker->name, 
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
            ]);
        }
    }
}

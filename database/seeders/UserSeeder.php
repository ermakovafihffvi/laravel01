<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
        $this->insertAdmin();
    }
    private function getData() {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i<=10; $i++) {
            $data[] = [

                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // password
                'remember_token' => Str::random(10),
                'role' => 0,
            ];
        }
        return $data;
    }
    public function insertAdmin()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // password
            'remember_token' => Str::random(10),
            'role' => 1
        ]);
    }
}

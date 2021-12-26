<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $data = [];
        $categoryIDs = DB::table('categories')->pluck('id');
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i<=30; $i++) {
            $data[] = [
                'isPrivate' => rand(0,1),
                'title' => Str::random(10),
                'text' => $faker->text(100),
                'category_id' => $faker->randomElement($categoryIDs),
                'author' => Str::random(7)
            ];
        }
        return $data;
    }
}

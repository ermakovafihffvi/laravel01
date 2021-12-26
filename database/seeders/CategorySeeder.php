<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'спорт',
            'slug' => 'sport',
        ]);
        DB::table('categories')->insert([
            'title' => 'политика',
            'slug' => 'politics',
        ]);
        DB::table('categories')->insert([
            'title' => 'экология',
            'slug' => 'ecology',
        ]);
    }
}

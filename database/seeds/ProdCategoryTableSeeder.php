<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('prod_categories')->insert([
            [
                'name' => 'Протеин',
                'slug' => 'protein',
                'description' => str_random(10),
            ],
            [
                'name' => 'Сывороточный Протеин',
//                'parent_id' => 1,
                'slug' => 'sivorotkfa  protein',
                'description' => str_random(10),
            ],
            [
                'name' => 'Креатин',
                'slug' => 'creatin',
                'description' => str_random(10),
            ],
            [
                'name' => 'BCAA',
                'slug' => 'bcaa',
                'description' => str_random(10),
            ],
            [
                'name' => 'топ 50',
                'slug' => 'top',
                'description' => str_random(10),
            ],
            [
                'name' => 'Цели',
                'slug' => 'goals',
                'description' => str_random(10),
            ],
        ]);
    }
}

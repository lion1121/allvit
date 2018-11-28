<?php

use Illuminate\Database\Seeder;

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
                'description' => str_random(10),
            ],
            [
                'name' => 'Креатин',
                'description' => str_random(10),
            ],
            [
                'name' => 'BCAA',
                'description' => str_random(10),
            ]
        ]);
    }
}

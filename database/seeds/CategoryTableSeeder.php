<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                'name' => 'Протеин',
                'description' => str_random(10),
            ],
            [
                'name' => 'Креатин',
                'description' => str_random(10),
            ]
        ]);
    }
}

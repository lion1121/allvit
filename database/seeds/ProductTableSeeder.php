<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'MusclePharm Combat',
                'slug' => 'MusclePharm Combat',
                'description' => str_random(10),
                'price' => 55
            ],
            [
                'name' => 'Syntrax Trophix',
                'slug' => 'Syntrax Trophix',
                'description' => str_random(10),
                'price' => 44,
            ],
            [
                'name' => 'BSN Syntha 6',
                'slug' => 'BSN Syntha 6',
                'description' => str_random(10),
                'price' => 33,
            ]
        ]);
    }
}

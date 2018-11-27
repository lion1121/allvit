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
                'name' => 'MusclePharm Combat protein',
                'slug' => 'MusclePharm Combatv',
                'description' => str_random(10),
                'price' => 55,
                'status' => true,
            ],
            [
                'name' => 'Syntrax Trophix protein',
                'slug' => 'Syntrax Trophixb',
                'description' => str_random(10),
                'price' => 44,
                'status' => true,
            ],
            [
                'name' => 'BSN Syntha 6 protein',
                'slug' => 'BSN Syntha 6m',
                'description' => str_random(10),
                'price' => 33,
                'status' => true,
            ],
            [
                'name' => 'BSN Syntha 6 creatin',
                'slug' => 'BSN Syntha 6g',
                'description' => str_random(10),
                'price' => 35,
                'status' => true,
            ],
            [
                'name' => 'BSN Syntha 6 creatin',
                'slug' => 'BSN Syntha 6f',
                'description' => str_random(10),
                'price' => 335,
                'status' => true,
            ],
            [
                'name' => 'BSN Syntha 6 creatin',
                'slug' => 'BSN Syntha 6e',
                'description' => str_random(10),
                'price' => 333,
                'status' => true,
            ],
            [
                'name' => 'BSN Syntha 6 BCCA',
                'slug' => 'BSN Syntha 61',
                'description' => str_random(10),
                'price' => 553,
                'status' => true,
            ],
            [
                'name' => 'BSN Syntha 6 BCCA',
                'slug' => 'BSN Syntha 62',
                'description' => str_random(10),
                'price' => 123,
                'status' => true,
            ],
            [
                'name' => 'BSN Syntha 6 BCCA',
                'slug' => 'BSN Syntha 63',
                'description' => str_random(10),
                'price' => 34,
                'status' => true,
            ]
        ]);
    }
}

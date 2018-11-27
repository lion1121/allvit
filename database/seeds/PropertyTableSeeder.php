<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('properties')->insert([
            [
                'name' => 'Weight',
            ],
            [
                'name' => 'Color',
            ],
            [
                'name' => 'Count',
            ],
            [
                'name' => 'Taste',
            ],
            [
                'name' => 'form',
            ],
        ]);
    }
}

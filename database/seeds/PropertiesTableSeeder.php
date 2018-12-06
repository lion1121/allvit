<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
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
                'product_id' => 1,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '300 гр',
            ],
            [
                'product_id' => 1,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'похудение'
            ],
            [
                'product_id' => 1,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '15'
            ],
            [
                'product_id' => 1,
                'slug' => 'вкус',
                'key' => 'taste',
                'value' => 'банан'
            ],
            [
                'product_id' => 1,
                'slug' => 'форма выпуска',
                'key' => 'form',
                'value' => 'порошок'
            ],
            [
                'product_id' => 2,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '350 гр'
            ],
            [
                'product_id' => 2,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'сжигание веса'
            ],
            [
                'product_id' => 2,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '35'
            ],
            [
                'product_id' => 2,
                'slug' => 'вкус',
                'key' => 'taste',
                'value' => 'шоколад'
            ],
            [
                'product_id' => 2,
                'slug' => 'форма выпуска',
                'key' => 'form',
                'value' => 'порошок'
            ],
            [
                'product_id' => 3,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '500 гр',
            ],
            [
                'product_id' => 3,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'сжигание веса'
            ],
            [
                'product_id' => 3,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '43'
            ],
            [
                'product_id' => 3,
                'slug' => 'вкус',
                'key' => 'taste',
                'value' => 'яблоко'
            ],
            [
                'product_id' => 3,
                'slug' => 'форма выпуска',
                'key' => 'form',
                'value' => 'порошок'
            ],
            [
                'product_id' => 4,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '200 гр'
            ],
            [
                'product_id' => 4,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'набор веса'
            ],
            [
                'product_id' => 4,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'выносливость'
            ],
            [
                'product_id' => 4,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '15'
            ],
            [
                'product_id' => 5,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '280 гр'
            ],
            [
                'product_id' => 5,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'похудение'
            ],
            [
                'product_id' => 5,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '18'
            ],
            [
                'product_id' => 5,
                'slug' => 'вкус',
                'key' => 'taste',
                'value' => 'виноград'
            ],
            [
                'product_id' => 6,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '100 гр'
            ],
            [
                'product_id' => 6,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'похудение'
            ],
            [
                'product_id' => 6,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '85 шт'
            ],
            [
                'product_id' => 7,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '1230 гр'
            ],
            [
                'product_id' => 7,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'здоровый сон'
            ],
            [
                'product_id' => 7,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '85 шт'
            ],
            [
                'product_id' => 8,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '110 гр'
            ],
            [
                'product_id' => 8,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '87 шт'
            ],
            [
                'product_id' => 8,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'здоровый сон'
            ],
            [
                'product_id' => 9,
                'slug' => 'фасовка',
                'key' => 'packing',
                'value' => '110 гр'
            ],
            [
                'product_id' => 9,
                'slug' => 'цель',
                'key' => 'goal',
                'value' => 'набор веса'
            ],
            [
                'product_id' => 9,
                'slug' => 'порций',
                'key' => 'portion',
                'value' => '75 шт'
            ],


            ]);
    }
}

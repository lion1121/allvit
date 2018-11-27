<?php

use Illuminate\Database\Seeder;

class ProductPropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_property')->insert([
            [
                'product_id' => 1,
                'property_id' => 1,
                'value' => '300 гр',
            ],
            [
                'product_id' => 1,
                'property_id' => 2,
                'value' => 'синий'
            ],
            [
                'product_id' => 1,
                'property_id' => 3,
                'value' => '15 шт'
            ],
            [
                'product_id' => 1,
                'property_id' => 4,
                'value' => 'banan'
            ],
            [
                'product_id' => 1,
                'property_id' => 5,
                'value' => 'powder'
            ],
            [
                'product_id' => 2,
                'property_id' => 1,
                'value' => '350 гр'
            ],
            [
                'product_id' => 2,
                'property_id' => 2,
                'value' => 'красный'
            ],
            [
                'product_id' => 2,
                'property_id' => 3,
                'value' => '5 шт'
            ],
            [
                'product_id' => 2,
                'property_id' => 4,
                'value' => 'шоколад'
            ],
            [
                'product_id' => 2,
                'property_id' => 5,
                'value' => 'powder'
            ],
            [
                'product_id' => 3,
                'property_id' => 1,
                'value' => '500 гр'
            ],
            [
                'product_id' => 3,
                'property_id' => 2,
                'value' => 'желтый'
            ],
            [
                'product_id' => 3,
                'property_id' => 3,
                'value' => '43 шт'
            ],
            [
                'product_id' => 3,
                'property_id' => 4,
                'value' => 'яблоко'
            ],
            [
                'product_id' => 3,
                'property_id' => 5,
                'value' => 'powder'
            ],
            [
                'product_id' => 4,
                'property_id' => 1,
                'value' => '200 гр'
            ],
            [
                'product_id' => 4,
                'property_id' => 2,
                'value' => 'синий'
            ],
            [
                'product_id' => 4,
                'property_id' => 3,
                'value' => '15 шт'
            ],
            [
                'product_id' => 4,
                'property_id' => 5,
                'value' => 'tablets'
            ],
            [
                'product_id' => 5,
                'property_id' => 1,
                'value' => '280 гр'
            ],
            [
                'product_id' => 5,
                'property_id' => 2,
                'value' => 'синий'
            ],
            [
                'product_id' => 5,
                'property_id' => 3,
                'value' => '18 шт'
            ],
            [
                'product_id' => 5,
                'property_id' => 5,
                'value' => 'tablets'
            ],
            [
                'product_id' => 6,
                'property_id' => 1,
                'value' => '100 гр'
            ],
            [
                'product_id' => 6,
                'property_id' => 2,
                'value' => 'фиолетовый'
            ],
            [
                'product_id' => 6,
                'property_id' => 3,
                'value' => '85 шт'
            ],
            [
                'product_id' => 6,
                'property_id' => 5,
                'value' => 'tablets'
            ],
            [
                'product_id' => 7,
                'property_id' => 1,
                'value' => '1230 гр'
            ],
            [
                'product_id' => 7,
                'property_id' => 2,
                'value' => 'фиолетовый'
            ],
            [
                'product_id' => 7,
                'property_id' => 3,
                'value' => '85 шт'
            ],
            [
                'product_id' => 7,
                'property_id' => 5,
                'value' => 'tablets'
            ],
            [
                'product_id' => 8,
                'property_id' => 1,
                'value' => '110 гр'
            ],
            [
                'product_id' => 8,
                'property_id' => 2,
                'value' => 'зеленый'
            ],
            [
                'product_id' => 8,
                'property_id' => 3,
                'value' => '87 шт'
            ],
            [
                'product_id' => 8,
                'property_id' => 5,
                'value' => 'tablets'
            ],
            [
                'product_id' => 9,
                'property_id' => 1,
                'value' => '50 гр'
            ],
            [
                'product_id' => 9,
                'property_id' => 2,
                'value' => 'лиловый'
            ],
            [
                'product_id' => 9,
                'property_id' => 3,
                'value' => '75 шт'
            ],
            [
                'product_id' => 9,
                'property_id' => 5,
                'value' => 'tablets'
            ],

            ]);
    }
}

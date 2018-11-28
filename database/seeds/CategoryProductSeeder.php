<?php

use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category_product')->insert([
            [
                'prod_category_id' => 1,
                'product_id' => 1,
            ],
            [
                'prod_category_id' => 1,
                'product_id' => 2,
            ],
            [
                'prod_category_id' => 1,
                'product_id' => 3,
            ],
            [
                'prod_category_id' => 2,
                'product_id' => 4,
            ],
            [
                'prod_category_id' => 2,
                'product_id' => 5,
            ],
            [
                'prod_category_id' => 2,
                'product_id' => 6,
            ],
            [
                'prod_category_id' => 3,
                'product_id' => 7,
            ],
            [
                'prod_category_id' => 3,
                'product_id' => 8,
            ],
            [
                'prod_category_id' => 3,
                'product_id' => 9,
            ],
        ]);
    }
}

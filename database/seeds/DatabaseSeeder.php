<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(ProdCategoryTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(PropertyTableSeeder::class);
         $this->call(ProductPropertyTableSeeder::class);
         $this->call(CategoryProductSeeder::class);
    }
}

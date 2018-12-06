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
         $this->call(PropertiesTableSeeder::class);
         $this->call(CategoryProductSeeder::class);
         $this->call(UserTableSeeder::class);
    }
}

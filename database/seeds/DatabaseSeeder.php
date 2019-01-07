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
        $this->call(UsersTableSeeder::class);

        $this->call(DishesTableSeeder::class);
        $this->call(ProducersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

        $this->call(TagsTableSeeder::class);
        $this->call(TaggablesTableSeeder::class);
    }
}

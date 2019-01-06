<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        foreach ($this->getProducts() as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    /**
     * Get products list.
     *
     * @return array
     */
    private function getProducts()
    {
        return [
            [
                'name' => 'Jabłko',
            ],
            [
                'name' => 'Gruszka',
            ],
            [
                'name' => 'Makaron',
            ],
            [
                'name' => 'Łosoś',
            ],
            [
                'id' => 5,
                'producer_id' => 2,
                'category_id' => null,
                'name' => 'Ryż Basmati Kupiec',
                'description' => null,
                'mass' => 400,
                'energy_kcal' => 344,
                'fat' => 0.6,
                'saturates' => 0.2,
                'carbohydrate' => 78,
                'sugars' => 0.2,
                'fibre' => 2.4,
                'protein' => 6.5,
                'salt' => 0.02,
            ],
            [
                'id' => 6,
                'producer_id' => 1,
                'category_id' => null,
                'name' => 'Serek Wiejski naturalny Piątnica 200g',
                'description' => null,
                'mass' => 200,
                'energy_kcal' => 406,
                'fat' => 5,
                'saturates' => 3.5,
                'carbohydrate' => 2,
                'sugars' => 1.5,
                'fibre' => null,
                'protein' => 11,
                'salt' => 0.7,
            ],
            [
                'name' => 'Ser żółty',
            ],
            [
                'name' => 'Szynka',
            ],
            [
                'name' => 'Masło',
            ],
        ];
    }
}

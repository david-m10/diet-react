<?php

use App\Models\Products\Product;
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
        (new ModelSeeder(Product::class, $this->getProducts()))->run();
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
                'producer_id' => null,
                'category_id' => null,
                'primitive_id' => null,

                'is_primitive' => true,

                'name' => 'Ryż',
                'description_short' => null,
                'description' => null,

                'mass_g' => null,
                'energy_kcal' => 344,
                'energy_kj' => 344,
                'fat' => 0.6,
                'saturates' => 0.2,
                'saturated_fatty_acids' => 0.2,
                'carbohydrate' => 78,
                'sugars' => 0.2,
                'fibre' => 2.4,
                'protein' => 6.5,
                'salt' => 0.02,
            ],
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
                'producer_id' => 2,
                'category_id' => null,
                'name' => 'Ryż Basmati Kupiec',
                'description' => null,
                'mass_g' => 400,
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
                'producer_id' => 1,
                'category_id' => null,
                'name' => 'Serek Wiejski naturalny Piątnica 200g',
                'description' => null,
                'mass_g' => 200,
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

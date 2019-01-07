<?php

use App\Models\Dishes\Dish;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new ModelSeeder(Dish::class, $this->getDishes(), true))->run();
    }

    /**
     * Get dishes data.
     *
     * @return array
     */
    private function getDishes(): array
    {
        return [
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Tortilla z kurczakiem i warzywami',
                'description_short' => 'Przepyszna, syta tortilla z pomidorem, ogórkiem, cebulą oraz kukurydzą..',
                'description' => 'Skosztuj ciekawego przepisu na tortillę!',
                'time_preparation' => 10,
                'time_making' => 15,
                'persons_min' => 1,
                'persons_max' => 1,
                'gallery_json' => json_encode([
                    [
                        'index' => 1,
                        'is_main' => true,
                        'extension' => 'jpeg',
                        'is_active' => true,
                    ],
                ]),
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'name' => 'Pancakes',
                'description_short' => 'Genialne pancakes z syropem klonowym, truskawkami i bitą śmietaną!',
                'description' => 'Spróbuj genialnych pancakes z syropem klonowym, truskawkami i bitą śmietaną!',
                'time_preparation' => 15,
                'time_making' => 15,
                'persons_min' => 2,
                'persons_max' => 4,
                'gallery_json' => json_encode([
                    [
                        'index' => 1,
                        'is_main' => true,
                        'extension' => 'jpeg',
                        'is_active' => true,
                    ],
                ]),
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'name' => 'Mus owocowy z poziomkami, jerzynami, migdałami i brzoskwinią',
                'description_short' => 'Świetne danie, które dostarczy Ci maksymalnej porcji energii',
                'description' => 'Spróbuj koniecznie.',
                'time_preparation' => 10,
                'time_making' => 10,
                'persons_min' => 1,
                'persons_max' => 2,
                'gallery_json' => json_encode([
                    [
                        'index' => 1,
                        'is_main' => true,
                        'extension' => 'jpeg',
                        'is_active' => true,
                    ],
                ]),
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'name' => 'Zupa Rybna',
                'description_short' => 'Proste oraz szybkie, wyjątkowe danie.',
                'description' => 'Nasza zupa rybna została wybrana najlepszą na świecie!',
                'time_preparation' => 10,
                'time_making' => 20,
                'persons_min' => 2,
                'persons_max' => 4,
                'gallery_json' => json_encode([
                    [
                        'index' => 1,
                        'is_main' => true,
                        'extension' => 'jpeg',
                        'is_active' => true,
                    ],
                ]),
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'name' => 'Burger wołowy z surówką Coleslaw',
                'description_short' => 'Burger z jajkiem, ziemniakami oraz wszystkim, co nejlepsze w burgerach!',
                'description' => 'Porcja zawiera dużą ilość białka.',
                'time_preparation' => 20,
                'time_making' => 20,
                'persons_min' => 1,
                'persons_max' => 2,
                'gallery_json' => json_encode([
                    [
                        'index' => 1,
                        'is_main' => true,
                        'extension' => 'jpeg',
                        'is_active' => true,
                    ],
                ]),
            ],
            [
                'id' => 9,
                'user_id' => 1,
                'name' => 'Pizza 4 sery',
                'description_short' => 'Pizza z serem gouda, mozarella, ementaler oraz serem kozim.',
                'description' => 'Zjedz pyszną pizzę wg naszego przepisu z legendarnej kuchni włoskiej! Zapewnisz pożywienie 
        4 osobom.',
                'time_preparation' => 30,
                'time_making' => 60,
                'persons_min' => 3,
                'persons_max' => 4,
                'gallery_json' => json_encode([
                    [
                        'index' => 1,
                        'is_main' => true,
                        'extension' => 'jpeg',
                        'is_active' => true,
                    ],
                ]),
            ],
            ['id' => 10,
                'user_id' => 1,
                'name' => 'Sałatka z pomidorami',
                'description_short' => 'Pyszna sałatka z pomidorami, rukolą, sałatą oraz sosem vinegrette!',
                'description' => 'Pyszna sałatka z pomidorami, rukolą, sałatą oraz sosem vinegrette dostarczy wam 
        niezapomnianych doznań smakowych. Jest to lekkie danie, które przygotujecie w 5 minut :)',
                'time_preparation' => 15,
                'time_making' => 30,
                'persons_min' => 1,
                'persons_max' => 2,
                'gallery_json' => json_encode([
                    [
                        'index' => 1,
                        'is_main' => true,
                        'extension' => 'jpeg',
                        'is_active' => true,
                    ],
                ]),
            ],
            [
                'id' => 12,
                'user_id' => 1,
                'name' => 'Spaghetti Bolognese',
                'description_short' => 'Szybkie danie wymagające niewielkiej ilości pracy i składników.',
                'description' => 'Nasze Spaghetti otrzymało status Złotego Spaghetti na Międzynarodowych Targach Pyszności w 
        Kielcach. Jest to danie o wyjątkowym smaku, ze względu na unikatowy...',
                'time_preparation' => 10,
                'time_making' => 20,
                'persons_min' => 2,
                'persons_max' => 2,
                'gallery_json' => json_encode([
                    [
                        'index' => 1,
                        'is_main' => true,
                        'extension' => 'jpeg',
                        'is_active' => true,
                    ],
                ]),
            ],
        ];
    }
}

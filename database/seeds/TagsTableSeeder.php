<?php

use App\Models\Tags\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new ModelSeeder(Tag::class, $this->getTags()))->run();
    }

    /**
     * Get tags list.
     *
     * @return array
     */
    private function getTags()
    {
        return [
            [
                'name' => 'Kuchnia polska',
            ],
            [
                'name' => 'Kuchnia włoska',
            ],
            [
                'name' => 'Kuchnia meksykańska',
            ],
            [
                'name' => 'Kuchnia francuska',
            ],
            [
                'name' => 'Wysoka ilość białka',
            ],
            [
                'name' => 'Lekkostrawne',
            ],
            [
                'name' => 'Koktajl',
            ],
            [
                'name' => 'Smoothie',
            ],
            [
                'name' => 'Weganizm',
            ],
            [
                'name' => 'Wegetarianizm',
            ],
            [
                'name' => 'Alkoholowe',
            ],
            [
                'name' => 'Rybne',
            ],
            [
                'name' => 'Mięsne',
            ],
            [
                'name' => 'Pikantne',
            ],
            [
                'name' => 'Ostre',
            ],
            [
                'name' => 'Łagodne',
            ],
            [
                'name' => 'Czerwone mięso',
            ],
            [
                'name' => 'Bez glutenu',
            ],
            [
                'name' => 'Bez laktozy',
            ],
            [
                'name' => 'Bez konserwantów',
            ],
            [
                'name' => 'Zupa',
            ],
            [
                'name' => 'Krem',
            ],
            [
                'name' => 'Sałatka',
            ],
            [
                'name' => 'Surówka',
            ],
            [
                'name' => 'Deser',
            ],
            [
                'name' => 'Śniadanie',
            ],
            [
                'name' => 'Obiad',
            ],
            [
                'name' => 'Kolacja',
            ],
            [
                'name' => 'Przekąska',
            ],
            [
                'name' => 'Niskokaloryczne',
            ],
            [
                'name' => 'Wysokokaloryczne',
            ],
        ];
    }
}

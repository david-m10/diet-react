<?php

use App\Models\Products\Producer;
use Illuminate\Database\Seeder;

class ProducersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new ModelSeeder(Producer::class, $this->getProducers(), true))->run();
    }

    /**
     * Get producers list.
     *
     * @return array
     */
    private function getProducers()
    {
        return [
            [
                'id' => 1,
                'name' => 'Piątnica',
            ],
            [
                'id' => 2,
                'name' => 'Kupiec',
            ],
        ];
    }
}

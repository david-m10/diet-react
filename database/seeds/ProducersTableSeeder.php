<?php

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
        $now = now();

        foreach ($this->getProducers() as $producer) {
            DB::table('producers')->insert([
                'id' => $producer['id'],
                'name' => $producer['name'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
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

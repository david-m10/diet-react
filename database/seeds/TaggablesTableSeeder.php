<?php

use App\Models\Dishes\Dish;
use Illuminate\Database\Seeder;

class TaggablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $dishesIds = DB::table('dishes')->pluck('id');
        $dishClass = Dish::class;
        $tagsIds = DB::table('tags')->pluck('id');

        foreach ($dishesIds as $dishId) {
            $randomTagsIds = $tagsIds->random(3);

            foreach ($randomTagsIds as $randomTagId) {
                DB::table('taggables')->insert([
                    'tag_id' => $randomTagId,
                    'taggable_id' => $dishId,
                    'taggable_type' => $dishClass,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
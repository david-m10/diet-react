<?php

namespace App\Models\Dishes;

use App\Models\Notes\Noteable;
use App\Models\Tags\Taggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dish
 *
 * @mixin \Eloquent
 */
class Dish extends Model
{
    use Noteable;
    use Taggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description_short',
        'description',
        'time_preparation',
        'time_making',
        'persons_min',
        'persons_max',
        'gallery_json'
    ];

//    public function getGalleryAttribute() {
//
//    }
//
//    public function getMainImageAttribute() {
//
//    }
}

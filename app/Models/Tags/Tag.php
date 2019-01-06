<?php

namespace App\Models\Tags;

use App\Models\Dishes\Dish;
use App\Models\Products\Product;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get all of the dishes that are assigned this tag.
     */
    public function dishes()
    {
        return $this->morphedByMany(Dish::class, 'taggable');
    }

    /**
     * Get all of the products that are assigned this tag.
     */
    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }

    /**
     * The users that belong to the tag.
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

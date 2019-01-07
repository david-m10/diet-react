<?php

namespace App\Models\Tags;

use App\Models\Dishes\Dish;
use App\Models\Products\Product;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tags\Tag
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Dishes\Dish[] $dishes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Products\Product[] $products
 * @property-read \App\Models\Users\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags\Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags\Tag whereUserId($value)
 * @mixin \Eloquent
 */
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

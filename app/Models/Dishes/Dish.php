<?php

namespace App\Models\Dishes;

use App\Models\Notes\Noteable;
use App\Models\Tags\Taggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dish
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int|null $prototype_id
 * @property string $name
 * @property string|null $description_short
 * @property string|null $description
 * @property int|null $time_preparation
 * @property int|null $time_making
 * @property int|null $persons_min
 * @property int|null $persons_max
 * @property string|null $stages_json
 * @property string|null $gallery_json
 * @property bool $is_public
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Notes\Note[] $notes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tags\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereDescriptionShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereGalleryJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish wherePersonsMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish wherePersonsMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish wherePrototypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereStagesJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereTimeMaking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereTimePreparation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Dishes\Dish whereUserId($value)
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
        'gallery_json',
        'is_public',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'gallery_json' => 'array',
        'is_public' => 'bool',
    ];

    public function getMainImageAttribute()
    {
        return $this->gallery_json;
    }
}

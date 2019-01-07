<?php

namespace App\Models\Products;

use App\Models\Tags\Taggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $producer_id
 * @property int|null $category_id
 * @property int|null $primitive_id
 * @property int $is_primitive
 * @property string $name
 * @property string|null $description_short
 * @property string|null $description
 * @property float|null $mass
 * @property float|null $energy_kcal
 * @property float|null $energy_kj
 * @property float|null $fat
 * @property float|null $saturates
 * @property float|null $saturated_fatty_acids
 * @property float|null $carbohydrate
 * @property float|null $sugars
 * @property float|null $fibre
 * @property float|null $protein
 * @property float|null $salt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Products\Producer|null $producer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tags\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereCarbohydrate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereDescriptionShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereEnergyKcal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereEnergyKj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereFat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereFibre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereIsPrimitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereMass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product wherePrimitiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereProducerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereProtein($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereSalt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereSaturatedFattyAcids($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereSaturates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereSugars($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Product whereUpdatedAt($value)
 */
class Product extends Model
{
    use Taggable;

    const UNIT_TYPE_QUANTITY = 1;
    const UNIT_MASS = 1;

    const UNIT_G = 1;
    const UNIT_MG = 2;
    const UNIT_KG = 3;
    const UNIT_ML = 4;
    const UNIT_L = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'unit_default',
    ];

    /**
     * Get the producer that product belongs to.
     */
    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }
}
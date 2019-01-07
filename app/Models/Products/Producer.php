<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Producer
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Products\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Producer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Producer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Producer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Producer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Producer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Producer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Producer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Producer whereUpdatedAt($value)
 */
class Producer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the products that belongs to producer.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
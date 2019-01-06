<?php

namespace App\Models\Products;

use App\Models\Tags\Taggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @mixin \Eloquent
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
<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Producer
 *
 * @mixin \Eloquent
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
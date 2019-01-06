<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @mixin \Eloquent
 */
class Category extends Model
{
    // TODO define base category and use nested set here

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
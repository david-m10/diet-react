<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Products\Category query()
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
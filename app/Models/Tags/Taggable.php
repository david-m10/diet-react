<?php

namespace App\Models\Tags;

trait Taggable
{
    /**
     * Get all of the tags for the given model.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
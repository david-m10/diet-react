<?php

namespace App\Models\Notes;

trait Noteable
{
    /**
     * Get all of the notes for the given model.
     */
    public function notes()
    {
        return $this->morphToMany(Note::class, 'noteable');
    }
}
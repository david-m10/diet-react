<?php

namespace App\Models\Notes;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Note
 *
 * @mixin \Eloquent
 */
class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * The users that belong to the note.
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

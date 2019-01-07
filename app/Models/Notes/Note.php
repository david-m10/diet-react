<?php

namespace App\Models\Notes;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Note
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Users\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notes\Note whereUserId($value)
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

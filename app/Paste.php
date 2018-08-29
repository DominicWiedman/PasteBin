<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Paste
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon|null $available_at
 * @property int $visibility_id
 * @property int|null $user_id
 * @property string $hash
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read \App\Visibility $visibility
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereAvailableAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Paste whereVisibilityId($value)
 * @mixin \Eloquent
 */
class Paste extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'available_at'
    ];

    public function visibility()
    {
        return $this->belongsTo(Visibility::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

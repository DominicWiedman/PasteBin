<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Visibility
 *
 * @property int $id
 * @property string $name
 * @property string $show_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Paste[] $pastes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visibility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visibility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visibility whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visibility whereShowName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visibility whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Visibility extends Model
{
    public function pastes()
    {
        return $this->hasMany(Paste::class);
    }
}

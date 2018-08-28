<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    public function pastes()
    {
        return $this->hasMany(Paste::class);
    }
}

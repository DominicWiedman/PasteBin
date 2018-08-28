<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function visibility()
    {
        return $this->belongsTo(Visibility::class);
    }
}

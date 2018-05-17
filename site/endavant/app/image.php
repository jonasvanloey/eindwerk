<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $fillable = [
        'url', 'imageable_id', 'imageable_type'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postingtype extends Model
{
    protected $fillable = ['type'];

    public function postings()
    {
        return $this->hasMany(posting::class);
    }
}

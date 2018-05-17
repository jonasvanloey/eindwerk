<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['description'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(rating::class);
    }

    public function portfolios()
    {
        return $this->hasMany(portfolio::class);
    }

    public function offers()
    {
        return $this->hasMany(offer::class);
    }
}

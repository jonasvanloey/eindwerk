<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['description','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
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
    public function favorites(){
        return $this->hasMany(favorite::class);
    }
}

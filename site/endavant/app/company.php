<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = ['name', 'vat_number', 'adress', 'phone_number', 'description'];

    //
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users', 'company_id', 'user_id');
    }

    public function postings()
    {
        return $this->hasMany(posting::class);
    }

    public function ratings()
    {
        return $this->hasMany(rating::class);
    }

    public function images()
    {
        return $this->morphMany(image::class, 'imageable');
    }
}

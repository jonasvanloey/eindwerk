<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posting extends Model
{
    protected $fillable = ['title', 'description', 'reason'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }

    public function postingtype()
    {
        return $this->belongsTo(postingtype::class);
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class, 'posting_tags', 'posting_id', 'tag_id');
    }

    public function offers()
    {
        return $this->hasMany(offer::class);
    }
    public function favorites(){
        return $this->hasMany(favorite::class);
    }
}

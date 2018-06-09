<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posting extends Model
{
    protected $fillable = ['title', 'description', 'reason','company_id','postingtype_id','student_id','is_finished'];

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
    public function chatgroups()
    {
        return $this->hasMany(Chatgroup::class);
    }
    public function portfolio()
    {
        return $this->hasOne(portfolio::class);
    }
    public function ratings(){
        return $this->hasMany(rating::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['tag'];

    public function postings()
    {
        return $this->belongsToMany(posting::class, 'posting_tags', 'posting_id', 'tag_id');
    }
}

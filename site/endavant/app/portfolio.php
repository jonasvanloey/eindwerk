<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    protected $fillable = ['title', 'link', 'description'];

    public function student()
    {
        return $this->belongsTo(student::class);
    }
    public function images()
    {
        return $this->morphMany(image::class, 'imageable');
    }
}

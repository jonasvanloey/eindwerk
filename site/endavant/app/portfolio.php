<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    protected $fillable = ['student_id', 'link', 'description','posting_id'];

    public function student()
    {
        return $this->belongsTo(student::class);
    }
    public function images()
    {
        return $this->morphMany(image::class, 'imageable');
    }

    public function posting()
    {
        return $this->belongsTo(posting::class);
    }

}

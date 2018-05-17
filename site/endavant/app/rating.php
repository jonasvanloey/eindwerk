<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $fillable = ['rating'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }

    public function student()
    {
        return $this->belongsTo(student::class);
    }
}

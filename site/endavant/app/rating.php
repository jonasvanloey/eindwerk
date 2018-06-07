<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $fillable = ['rating','student_id','posting_id','company_id'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }

    public function student()
    {
        return $this->belongsTo(student::class);
    }
    public function favorites(){
        return $this->hasMany(favorite::class);
    }
}

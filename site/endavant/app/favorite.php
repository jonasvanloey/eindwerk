<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $fillable = ['type','made_on'];

    public function company(){
        return $this->belongsTo(company::class);
    }
    public function student(){
        return $this->belongsTo(student::class);
    }
    public function posting(){
        return $this->belongsTo(posting::class);
    }
    //
}

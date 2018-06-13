<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = ['question'];

    public function answers(){
        return $this->hasMany(answer::class);
    }
}

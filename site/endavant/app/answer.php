<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    public $table = 'answers';

    protected $fillable = ['answer'];

    public function question(){
        return $this->belongsTo(question::class);
    }
}

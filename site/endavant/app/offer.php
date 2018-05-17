<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    public function portfolio()
    {
        return $this->belongsTo(portfolio::class);
    }

    public function student()
    {
        return $this->belongsTo(student::class);
    }
}

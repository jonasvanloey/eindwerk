<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['message','destination_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function chatgroup()
    {
        return $this->belongsTo(Chatgroup::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatgroup extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'chatgroup_users');
    }
    public function messages(){

        return $this->hasMany(Message::class);
    }
}

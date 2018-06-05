<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatgroup extends Model
{
    protected $fillable=['posting_id','is_active'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'chatgroup_users');
    }
    public function messages(){

        return $this->hasMany(Message::class);
    }
    public function posting(){
        return $this->belongsTo(posting::class);
    }
}

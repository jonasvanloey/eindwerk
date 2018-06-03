<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'familyname', 'phone_number', 'date_of_birth', 'national_register'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {
        return $this->hasOne(student::class);
    }

    public function companies()
    {
        return $this->belongsToMany(company::class, 'company_user');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function chatgroups()
    {
        return $this->belongsToMany(Chatgroup::class, 'chatgroup_users');
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password', 'role_id', 'is_active'
];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isAdmin(){
        if($this->role->name=="ROLE_ADMIN")
            return true;
        else
            return false;


    }


    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function jobs(){
        return $this->hasMany('App\Job');
    }
    public function specialty(){
        return $this->belongsToMany('App\Specialty');
    }

}

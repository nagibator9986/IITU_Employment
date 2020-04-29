<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
        'name', 'user_id', 'schedule', 'salary1', 'salary2', 'city', 'country', 'description', 'responsibilities'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    public function user(){
        return $this->belongsTo('App\User');
    }


    public function specialty(){
        return $this->belongsToMany('App\Specialty');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $fillable = [
        'job_id', 'user_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    public function job(){
        return $this->belongsTo('App\Job');
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
}

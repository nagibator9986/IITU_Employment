<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    //

    public function jobs(){
        return $this->belongsToMany('App\Job');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [

        'name',
        'status',
        'start',
        'end',
    ];

    public function teams(){
        return $this->hasMany('App\Team');
    }

    public function groups(){
        return $this->hasMany('App\Group');
    }

    public function players()
    {
            return $this->hasMany('App\Player');
    }
    

}

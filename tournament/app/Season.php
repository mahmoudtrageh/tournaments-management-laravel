<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
       protected $fillable = [

        'name',
        'status',
        'start',
        'end',
        'max',
    ];


     public function tournaments()
    {
            return $this->hasMany('App\Tournament');
    }

    public function teams()
    {
            return $this->hasMany('App\Team');
    }

     public function players()
    {
            return $this->hasMany('App\Player');
    }


        public function max()
    {
            return $this->hasMany('App\teams');
    }


        public function teamss () {
        return $this->belongsToMany(Team::class, 'team_seasons', 'season_id', 'team_id');
    }

}

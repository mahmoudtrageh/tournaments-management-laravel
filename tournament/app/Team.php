<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'tournament_id',
                'season_id',
        'manager_name',
        'manager_email',
        'mobile_number',
        'status',
        'code',
        'password',
        'logo',
        'city',
        'trainer',
        'max_player',
    ];

    public function tournaments()
    {
            return $this->belongsTo('App\Tournament', 'tournament_id');
    }

    public function unions()
    {
            return $this->belongsTo('App\Union', 'union_id');
    }

     public function seasons()
    {
            return $this->belongsTo('App\Season', 'season_id');
    }

      public function seasonss () {
        return $this->belongsToMany(Season::class, 'team_seasons', 'team_id', 'season_id');
    }

    public function players()
    {
            return $this->hasOne('App\Player');
    }
    public function playerss()
    {
            return $this->hasMany(Player::class, 'team_id', 'id');
    } 
    
      public function admins () {
        return $this->belongsToMany(Admin::class, 'admin_team', 'team_id', 'admin_id');
    }

         public function max_seasons()
    {
            return $this->belongsTo('App\Season', 'max_player');
    }

}

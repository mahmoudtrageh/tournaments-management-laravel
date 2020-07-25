<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    protected $fillable = [
        'name',
        'tournament_id',
        'max_birth',
        'min_birth',
        'max_players',
    ];

    public function tournaments()
    {
        return $this->belongsTo('App\Tournament', 'tournament_id');
    }

    public function players()
    {
            return $this->hasMany('App\Player');
    }
    
    public function teams() {
        return $this->belongsToMany(Team::class, 'team_group', 'team_id', 'group_id');
    }

  public function teamss() {
        return $this->belongsToMany(Team::class, 'team_group');
    }
}

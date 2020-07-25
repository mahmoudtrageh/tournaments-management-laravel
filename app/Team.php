<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'tournament_id',
        'manager_name',
        'manager_email',
        'mobile_number',
        'status',
        'code',
        'password',
    ];

    public function tournaments()
    {
            return $this->belongsTo('App\Tournament');
    }

    public function players()
    {
            return $this->hasOne('App\Player');
    }

    public function tournamentss() {
        return $this->belongsToMany(Tournament::class, 'team_activity', 'team_id', 'tournament_id');
    }

    public function groups() {
        return $this->belongsToMany(Group::class, 'team_group', 'team_id', 'group_id');
    }

    public function playerss()
    {
            return $this->hasMany(Player::class, 'team_id', 'id');
    } 


    public function groupss()
    {
            return $this->hasMany(Player::class, 'group_id');
    } 
    
    
      public function admins () {
        return $this->belongsToMany(Admin::class, 'admin_team', 'team_id', 'admin_id');
    }

}

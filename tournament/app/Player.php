<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'tournament_id',
        'team_id',
        'national_id',
        'season_id',
        'status',
        'birth',
        'file1',
        'file2',
        'img',
        'club_registered',
        'club_name',
        'nationality',
    ];

    public function tournaments()
    {
            return $this->belongsTo('App\Tournament', 'tournament_id');
    }

    public function teams()
    {
            return $this->belongsTo('App\Team', 'team_id');
    }
    
     public function punishments()
    {
            return $this->hasMany('App\Punishment');
    }

       public function seasons()
    {
            return $this->belongsTo('App\Season', 'season_id');
    }


}

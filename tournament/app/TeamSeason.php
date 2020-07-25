<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamSeason extends Model
{
    protected $fillable = [
        'team_id',
        'season_id',
    ];

    protected $table = 'team_seasons';
}

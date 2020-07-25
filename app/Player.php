<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'tournament_id',
        'team_id',
        'group_id',
        'national_id',
        'status',
        'birth',
        'file1',
        'file2',
        'img',
    ];

    public function tournaments()
    {
            return $this->belongsTo('App\Tournament', 'tournament_id');
    }

    public function teams()
    {
            return $this->belongsTo('App\Team', 'team_id');
    }

    public function groups()
    {
            return $this->belongsTo('App\Group', 'group_id');
    }

}

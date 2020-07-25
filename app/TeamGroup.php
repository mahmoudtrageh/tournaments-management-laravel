<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamGroup extends Model
{
    protected $fillable = [
        'team_id',
        'group_id',
    ];

    protected $table = 'team_group';
}

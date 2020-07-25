<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punishment extends Model
{
        protected $fillable = [
        'date',
        'text',
        'player_id',
    ];


   public function players()
    {
            return $this->belongsTo('App\Player', 'player_id');
    }
}

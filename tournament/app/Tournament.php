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
         'logo',
        'details',
        'admin_id',
        'season_id',
    ];

    
    public function teams(){
        return $this->hasMany('App\Team');
    }
    
    public function players()
    {
            return $this->hasMany('App\Player');
    }
    

     public function admins()
    {
            return $this->belongsTo('App\Admin', 'admin_id');
    }

     public function seasons()
    {
            return $this->belongsTo('App\Season', 'season_id');
    }

      public function unions()
    {
            return $this->belongsTo('App\Union', 'union_id');
    }
}

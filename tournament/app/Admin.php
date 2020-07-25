<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $fillable = [

        'name',
        'email',
        'password',
        'img',
        
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles () {
        return $this->belongsToMany(Role::class, 'admin_role', 'admin_id', 'role_id');
    }

    public function teams () {
        return $this->belongsToMany(Team::class, 'admin_team', 'admin_id', 'team_id');
    }

    public function code()
    {
        return $this->hasOne('App\Code', 'admin_id');
    }

      public function tournaments()
    {
            return $this->hasMany('App\Tournament', 'admin_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    
    protected $fillable = [

        'admin_id',
        'code',
    ];

    public function admin(){
        return $this->belongsTo('App\Admin');
    }

}

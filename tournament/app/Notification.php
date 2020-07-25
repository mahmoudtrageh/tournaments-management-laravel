<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected  $fillable=[
        'notifiable_id',
        'notifiable_type',
        'data',
        'read_at',
        'type',
    ];
}

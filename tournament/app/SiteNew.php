<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteNew extends Model
{
      protected $fillable = [
        'date',
        'title',
        'text',
        'status',
    ];
}

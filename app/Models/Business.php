<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public $timestamps = false;

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    public $timestamps = true;

    public function staffs()
    {
        return hasMany('App\Models\Staff');
    }
}

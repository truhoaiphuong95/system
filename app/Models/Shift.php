<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public $table = 'shifts';
    public $fillable = ['staff_id', 'date', 'session', 'is_accept'];

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }
}

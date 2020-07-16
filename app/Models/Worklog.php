<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worklog extends Model
{
    public $timestamps = true;
    public $table = 'worklogs';
    public $fillable = ['staff_id', 'content', 'session', 'date'];

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }
}

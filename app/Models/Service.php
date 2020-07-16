<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $fillable = ['sku', 'name', 'price'];
    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket');
    }
}

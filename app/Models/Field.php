<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';
    protected $fillable = ['id', 'ten'];
    
    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt', 'field_id');
    }

    public function payment()
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function subfields()
    {
        return $this->hasMany('App\Models\Subfield');
    }
}

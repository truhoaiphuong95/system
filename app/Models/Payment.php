<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    public $fillable = ['staff_id', 'client_id', 'content', 'number', 'branch_id', 'field_id', 'note', 'amount', 'created_at'];
    
    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    
    public function field()
    {
        return $this->belongsTo('App\Models\Field');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }
}

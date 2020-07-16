<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $table = 'receipts';
    public $fillable = ['id', 'number', 'client_id', 'staff_id', 'field_id', 'branch_id', 'content', 'amount', 'created_at'];
    
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

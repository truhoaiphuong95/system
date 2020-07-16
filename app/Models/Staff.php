<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    protected $table = 'staffs';
    protected $fillable = ['id', 'phone', 'name', 'birthday'];
    protected $hidden = [
        'matkhau', 'remember_token'
    ];
    public function username()
    {
        return 'phone';
    }

    public function tickets() {
        return $this->hasMany('App\Models\Ticket');
    }

    public function receipts() {
        return $this->hasMany('App\Models\Receipt');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }
    
    public function isOfficial()
    {
        return $this->level >=2;
    }

    public function isLeader()
    {
        return $this->level >=3;
    }

    public function isManager()
    {
        return $this->level >=4;
    }
}

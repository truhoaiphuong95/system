<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = true;
    public $table = 'clients';
    public $fillable = ['phone', 'name', 'birthday', 'zalo', 'major', 'email', 'fburl'];
    
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt');
    }
    
    public function courseStudents()
    {
        return $this->hasMany('App\Models\CourseStudent');
    }

    public function linkName() {
        return '<a href="'.route('staff.client.view.get', ['client_id' => $this->id], false).'">'.$this->name.'</a>';
    }

    public function linkPhone() {
        return '<a href="tel:'.$this->phone.'">'.$this->phone.'</a>';
    }
}

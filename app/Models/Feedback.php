<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $timestamps = true;
    protected $table = 'feedbacks';
    public $fillable = ['content', 'ticket_id'];

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }


}

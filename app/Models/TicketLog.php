<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketLog extends Model
{
    public $timestamps = true;
    public $table = 'ticket_logs';
    public $fillable = ['id','ticket_id','staff_id','content', 'is_public'];
    
    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }
    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}

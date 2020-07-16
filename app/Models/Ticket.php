<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = true;
    public $table = 'tickets';
    public $fillable = ['client_id', 'staff_id', 'requestment', 'model', 'cpu', 'ram', 'storage', 'other', 'note', 'ticket_status_id', 'price'];
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    
    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }
    
    public function ticketLogs()
    {
        return $this->hasMany('App\Models\TicketLog')->orderBy('id', 'desc');
    }
    
    public function ticketStatus()
    {
        return $this->belongsTo('App\Models\TicketStatus');
    }

    public function feedback()
    {
        return $this->hasOne('App\Models\Feedback');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }
}

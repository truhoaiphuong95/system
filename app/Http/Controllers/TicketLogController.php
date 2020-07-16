<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Core\Services\TicketLogServiceContract;

use App\Http\Requests;
use App\Models\TicketLog;

class TicketLogController extends Controller
{
    protected $model;
    protected $service;
    public function __construct(ticket_log $model, TicketLogServiceContract $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function getList() {
        $data['ticket_logs'] = $this->service->getList();
        return view('ticket-loglist', $data);
    }
    
    public function postAdd(Request $req) {
        $data = $req->only($this->model->fillable);
        $id = $this->service->store($data);
        return redirect()->route('staff.ticket.view.get', ['ticket_id' => $req->ticket_id]);
    }
    
    public function getSetpublic($ticket_log_id) {
        $ticket_log = $this->service->find($ticket_log_id);
        $this->service->update($ticket_log_id, ['is_public' => !($ticket_log->is_public)]);
        return redirect()->route('staff.ticket.view.get', ['ticket_id' => $ticket_log->ticket->id]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Ticket;
use App\Models\Feedback;

class TicketRateController extends Controller
{
    protected $model;
    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }
    public function getRate($ticket_id)
    {
        $data['ticket'] = ticket::find($ticket_id);
        return view('ticket-rate', $data);
    }

    public function postRate($ticket_id, Request $req)
    {
        $ticket = ticket::find($ticket_id);

        // Save feedback
        $data = $req->only($this->model->fillable);
        $data['ticket_id'] = $ticket->id;
        $feedback = $this->model->create($data);

        // Change status
        $ticket->ticket_status_id = 5;
        $ticket->save();

        return redirect()->route($req->redirectTo)->with('success', 'Lưu kết quả thành công.');
    }
}

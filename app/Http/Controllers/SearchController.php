<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Ticket;
use Core\Services\TicketServiceContract;
use Core\Services\ClientServiceContract;

class SearchController extends Controller
{
    protected $ticket_service;
    protected $client_service;
    public function __construct(TicketServiceContract $ticket_service, ClientServiceContract $client_service)
    {
        $this->ticket_service = $ticket_service;
        $this->client_service = $client_service;
    }

    public function getSearch(Request $request) {
        $keyword = $request->keyword;
        if (strlen($keyword) < 10) {
            $data = ticket::findOrFail($keyword);
            return redirect()->route('staff.ticket.view.get', ['ticket_id'=>$data->id]);
        } 
        
        if (strlen($keyword) == 10) {
            $data = client::where('phone', $keyword)->first();
            if ($data) {
                return redirect()->route('staff.client.view.get', ['client_id'=>$data->id]);
            } else {
                return redirect()->route('staff.client.add.get', ['phone' => $keyword]);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Models\Ticket;
use App\Models\TicketLog as log;
use App\Models\Client;

class TrackingController extends Controller
{
    protected $ticket;
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function getSearch()
    {
        return view('tracking-search');
    }

    public function postSearch(Request $request)
    {
        $keyword = $request->inputKeyword;
        try {
            $client = Client::where('phone', $keyword)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors('Không tìm thấy số điện thoại này! Xin kiểm tra lại.');
        }
        return redirect()->route('guest.tracking.client.get', ['client_id' => $client->id]);
    }

    public function getByTicket($ticket_id, $sixdigit)
    {
        try {
            $ticket = $this->ticket->findOrFail($ticket_id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('guest.tracking.index.get')->withErrors('Không tìm thấy số phiếu biên nhận này! Xin kiểm tra lại.');
        }
        if ($sixdigit != substr($ticket->client->phone, -6)) {
            return redirect()->route('guest.tracking.index.get')->withErrors('Bạn không có quyền truy cập thông tin này.');
        }

        $data['ticket'] = $ticket;
        $data['logs'] = log::where('ticket_id', $ticket_id)->where('is_public', '1')->orderBy('id', 'desc')->get();
        return view('tracking-view', $data);
    }

    public function getByClient($client_id)
    {
        $client = Client::findOrFail($client_id);
        $data['tickets'] = $client->tickets;
        $data['sixdigit'] = substr($client->phone, -6);
        return view('tracking-client', $data);
    }
}

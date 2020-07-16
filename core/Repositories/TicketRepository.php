<?php

namespace Core\Repositories;
use App\Models\Ticket;

class TicketRepository implements TicketRepositoryContract
{
    protected $model;

    public function __construct(ticket $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with('client', 'ticketStatus', 'services')->orderBy('id', 'desc')->get();
    }
    
    public function paginate() {
        return $this->model->paginate(10);
    }

    public function find($id) {
        return $this->model->findOrFail($id);
    }

    public function store($data) {
        return $this->model->create($data);
    }

    public function update($id, $data) {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id) {
        $model = $this->find($id);
        return $model->destroy($id);
    }

    public function getAllWithoutDone()
    {
        return $this->model->where('ticket_status_id', '!=', 5)->with('client', 'ticketStatus', 'feedback')->orderBy('id', 'desc')->paginate(50);
    }

    public function getView($id)
    {
        return $this->model->with('ticketLogs.staff')->find($id); 
    }

    public function fillable($data)
    {
        return $data->only($this->model->fillable);
    }
}
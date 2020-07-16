<?php

namespace Core\Repositories;
use App\Models\TicketStatus;

class TicketStatusRepository implements TicketStatusRepositoryContract
{
    protected $model;

    public function __construct(ticketStatus $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
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
}
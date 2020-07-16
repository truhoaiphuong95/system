<?php

namespace Core\Repositories;
use App\Models\Payment;

class PaymentRepository implements PaymentRepositoryContract
{
    protected $model;

    public function __construct(payment $model)
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
        $model->update($data);
        return $model;
    }

    public function destroy($id) {
        $model = $this->find($id);
        return $model->destroy($id);
    }

    public function getList()
    {
        return $this->model->with('branch', 'client', 'field')->get();
    }

    public function getListbyField($field_id)
    {
        return $this->model->where('field_id', $field_id)->with('branch', 'client', 'field')->get();
    }

    public function fillable($data)
    {
        return $data->only($this->model->fillable);
    }
}
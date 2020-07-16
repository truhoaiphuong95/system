<?php

namespace Core\Services;

use Core\Repositories\ServiceRepositoryContract;

class ServiceService implements ServiceServiceContract
{
    protected $repository;

    public function __construct(ServiceRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }
    
    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($req)
    {
        $data = $this->repository->fillable($req);
        return $this->repository->store($data);
    }

    public function update($id, $req)
    {
        $data = $this->repository->fillable($req);
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function getList()
    {
        return $this->repository->getList();
    }
}
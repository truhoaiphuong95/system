<?php

namespace Core\Services;

use Core\Repositories\ClientRepositoryContract;
use App\Helpers\DownloadExcel;

class ClientService implements ClientServiceContract
{
    protected $repository;

    public function __construct(ClientRepositoryContract $repository)
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
        if(UserInfo()->level<3) {
            return redirect()->back();
        }
        return $this->repository->all();
    }

    public function getView($id)
    {
        return $this->repository->getView($id);
    }

    public function downloadAll()
    {
        $clients_array = $this->repository->all();
        return new DownloadExcel('client_export', 'csv', $clients_array);
    }

    public function downloadEdu()
    {
        $clients = $this->repository->all();
        foreach ($clients as $client) {
            if(count($client->tickets) == 0) {
                $clients_array[] = $client->toArray();
            }
        }
        return new DownloadExcel('client_export_edu', 'csv', $clients_array);
    }

    public function downloadTech()
    {
        $clients = $this->repository->all();
        foreach ($clients as $client) {
            if(count($client->tickets) != 0) {
                $clients_array[] = $client->toArray();
            }
        }
        return new DownloadExcel('client_export_tech', 'csv', $clients_array);
    }
}
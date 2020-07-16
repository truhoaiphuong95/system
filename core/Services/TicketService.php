<?php

namespace Core\Services;

use Core\Repositories\TicketRepositoryContract;
use Core\Services\TicketRelatedService;

class TicketService implements TicketServiceContract
{
    protected $repository;
    protected $relatedService;

    public function __construct(TicketRepositoryContract $repository, TicketRelatedService $related)
    {
        $this->repository = $repository;
        $this->relatedService = $related;
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
        $data['ticket_status_id'] = 1;
        $ticket = $this->repository->store($data);
        $log['ticket_id'] = $ticket->id;
        $log['staff_id'] = UserInfo()->id;
        $log['content'] = "Đang chờ xử lý.";
        $log['is_public'] = true;
        $this->relatedService->log->store($log);
        if(isset($req->services)) {
            foreach($req->services as $service_id) {
                $service = $this->relatedService->service->find($service_id);
                $ticket->services()->attach($service->id);
            }
        }
        return $ticket;
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
        return $this->repository->getAllWithoutDone();
    }

    public function setStatusId($id, $ticketstatus_id, $price)
    {
        $data['ticket_status_id'] = $ticketstatus_id;
        if($price != NULL) $data['price'] = $price;
        
        $status = $this->relatedService->status->find($ticketstatus_id);
        $log['content'] = "Đã thay đổi trạng thái thành ".$status->name;
        $log['ticket_id'] = $id;
        $log['staff_id'] = UserInfo()->id;
        $log['is_public'] = 0;
        $this->relatedService->log->store($log);

        return $this->repository->update($id, $data);
    }

    public function getView($id)
    {
        $data['ticket'] = $this->repository->getView($id);
        $data['ticket_statuses'] = $this->relatedService->status->all();
        return $data;
    }
}
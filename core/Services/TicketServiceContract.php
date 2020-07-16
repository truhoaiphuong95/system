<?php

namespace Core\Services;

interface TicketServiceContract
{
    public function all();
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
    public function getList();
    public function setStatusId($id, $ticketstatus_id, $price);
    public function getView($id);
}
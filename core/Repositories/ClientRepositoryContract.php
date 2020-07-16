<?php

namespace Core\Repositories;

interface ClientRepositoryContract
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
    public function all();
    public function getView($id);
}
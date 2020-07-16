<?php

namespace Core\Repositories;

interface CourseRepositoryContract
{
    public function all();
    public function list();
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}
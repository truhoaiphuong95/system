<?php

namespace Core\Services;

interface CourseServiceContract
{
    public function all();
    public function list();
    public function show($id);
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
    public function download($id);
}
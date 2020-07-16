<?php

namespace Core\Repositories;
use App\Models\Course;

class CourseRepository implements CourseRepositoryContract
{
    protected $model;

    public function __construct(course $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->where('is_expected', '!=', '1')->get();
    }

    public function list()
    {
        return $this->model->where('is_expected', '!=', '1')->with('courseStudents')->get();
    }

    public function show($id)
    {
        return $this->model->with('courseStudents.client')->findOrFail($id);
    }

    public function getExpected()
    {
        return $this->model->where('is_expected', '=', '1')->with('courseStudents')->get();
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

    public function fillable($req)
    {
        return $req->only($this->model->fillable);
    }
}
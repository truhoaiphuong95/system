<?php

namespace Core\Services;

use Core\Repositories\CourseRepositoryContract;
use Excel;
use App\Exports\CourseStudentListExport;

class CourseService implements CourseServiceContract
{
    protected $repository;

    public function __construct(CourseRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function list()
    {
        return $this->repository->list();
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function getExpected()
    {
        return $this->repository->getExpected();
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

    public function download($id)
    {
        $course = $this->find($id);
        return Excel::download(new CourseStudentListExport($course), $course->shortname.'-list.xlsx');
    }
}
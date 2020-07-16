<?php

namespace Core\Services;

use Core\Repositories\CourseGroupRepositoryContract;

class CourseGroupService implements CourseGroupServiceContract
{
    protected $repository;

    public function __construct(CourseGroupRepositoryContract $repository)
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

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function postAdd($data, CourseServiceContract $course_repo, ClientServiceContract $client_repo)
    {
        $course = $course_repo->find($data->course_id);
        $client = $client_repo->find($data->client_id);

        //XỬ LÝ KHI LỚP ĐÃ ĐẦY
        if($course->isFull()) {
            return redirect()->back()->withErrors(['Lớp này đã đủ sỉ số, hãy chọn lớp khác hoặc sửa thông tin lớp!']); 
        }

        if(!$this->repository($client->id, $course->id)) {
            $this->repository->store($data);
        }

        return $course;
    }
}
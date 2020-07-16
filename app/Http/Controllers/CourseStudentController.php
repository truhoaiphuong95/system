<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Client;
use App\Models\Course;
use App\Models\CourseStudent;
use Core\Services\CourseStudentServiceContract;
use Core\Services\ClientServiceContract;
use Core\Services\CourseServiceContract;

class CourseStudentController extends Controller
{
    protected $model;
    protected $service;
    protected $course_service;
    protected $client_service;
    public function __construct(CourseStudent $model, CourseStudentServiceContract $service, CourseServiceContract $course_service, ClientServiceContract $client_service)
    {
        $this->model = $model;
        $this->service = $service;
        $this->course_service = $course_service;
        $this->client_service = $client_service;
    }

    public function getAdd($client_id) {
        $data['client'] = client::findOrFail($client_id);
        $data['courses'] = course::all();
        return view('student-add', $data);
    }

    public function postAdd(Request $req){
        $data = $req->only($this->model->fillable);
        $course = $this->service->store($data);
        return redirect()->route('staff.course.view.get', ['course_id' => $req->course_id])->with('msg', 'Thêm thành công!');
    }

    public function getEdit($student_id) {
        $data['course_student'] = $this->service->find($student_id);
        $data['courses'] = course::all();
        return view('student-edit', $data); 
    }

    public function postEdit(Request $req) {
        $data = $req->only($this->model->fillable);
        $student = $this->service->update($req->id, $data);

        return redirect()->route('staff.course.view.get', ['course_id' => $req->course_id])->with('success', 'Sửa thông tin thành công!');
    }

    public function getDelete($student_id) {
        $student = $this->service->find($student_id);
        $student->delete();
        return redirect()->back()->with('success', 'Đã xóa khỏi lớp thành công!');
    }
}

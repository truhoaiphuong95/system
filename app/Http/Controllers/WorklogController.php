<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Worklog;
use Carbon\Carbon;

class WorklogController extends Controller
{
    protected $model;
    protected $session;
    public function __construct(Worklog $model)
    {
        $this->model = $model;
        $this->session = [
            'morning' => 'Buổi sáng',
            'afternoon' => 'Buổi chiều',
            'everning' => 'Buổi tối'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $data['worklogs'] = $this->model->orderBy('id', 'DESC')->get();
        $data['session'] = $this->session;
        return view('worklog-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        $data['today'] = Carbon::now()->toDateString();
        return view('worklog-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        $data = $request->only($this->model->fillable);
        $this->model->create($data);
        return redirect()->route('staff.worklog.list.get')->with('success', 'Gửi báo cáo thành công');
    }

    public function getEdit($worklog_id)
    {
        $data['worklog'] = $this->model->findOrFail($worklog_id);
        $data['session'] = $this->session;
        return view('worklog-edit', $data);
    }

    public function postEdit($worklog_id, Request $request)
    {
        $worklog = $this->model->findOrFail($worklog_id);
        $data = $request->only($this->model->fillable);
        $data['staff_id'] = $worklog->staff_id;
        $worklog->update($data);

        return redirect()->route('staff.worklog.list.get')->with('success', 'Chỉnh sửa thành công');
    }
}

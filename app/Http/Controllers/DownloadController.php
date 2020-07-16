<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Download;

class DownloadController extends Controller
{
    protected $model;
    public function __construct(Download $model)
    {
        $this->model = $model;
    }

    public function getListforGuest() {
        $data['downloads'] = download::all();
        return view('download-publiclist', $data);
    }
    
    public function getList() {
        $data['downloads'] = download::all();
        return view('download-list', $data);
    }
    
    public function getAdd() {
        return view('download-add');
    }
    
    public function postAdd(Request $request) {
        $data = $request->only($this->model->fillable);
        $download = $this->model->create($data);
        return redirect()->route('staff.download.list.get')->with('success','Đã thêm thành công!');
    }
    
    public function getEdit($download_id) {
        $data['download'] = $this->model->findOrFail($download_id);
        return view('download-edit', $data);
    }
    
    public function postEdit($download_id, Request $request) {
        $download = $this->model->findOrFail($download_id);
        $data = $request->only($this->model->fillable);
        $download->update($data);
        return redirect()->route('staff.download.list.get')->with('success','Lưu thay đổi thành công!');
    }
    
    public function getDelete($download_id) {
        $download = $this->model->findOrFail($download_id)->delete();
        return redirect()->route('staff.download.list.get')->with('success','Đã xóa thành công!');
    }
}

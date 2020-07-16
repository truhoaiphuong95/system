<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClientRequest;
use App\Http\Controllers\Controller;
use Core\Services\ClientServiceContract;

class ClientController extends Controller
{
    protected $service;

    public function __construct(ClientServiceContract $service)
    {
        $this->service = $service;
    }

    public function getList() {
        $data['clients'] = $this->service->getList();
        return view('client-list', $data);
    }
    
    public function getView($client_id) {
        $data['client'] = $this->service->getView($client_id);
        return view('client-view', $data);
    }

    public function getAdd($phone = NULL)
    {
        $data['phone'] = $phone;
        return view('client-add', $data);
    }
    
    public function postAdd(AddClientRequest $req) 
    {
        $id = $this->service->store($req);
        return redirect()->route('staff.client.view.get', ['client_id'=>$id]);
    }
    
    public function getEdit($client_id) {
        $data['client'] = $this->service->find($client_id);
        return view('client-edit', $data);
    }
    
    public function postEdit($client_id, AddClientRequest $req) 
    {
        $this->service->update($client_id, $req);
        return redirect()->route('staff.client.view.get', ['client_id'=>$client_id])->with('success', 'Đã cập nhật thành công!');
    }

    public function getExport()
    {
        return $this->service->downloadAll();
    }

    public function getExportEdu()
    {
        return $this->service->downloadEdu();
    }

    public function getExportTech()
    {
        return $this->service->downloadTech();
    }
}

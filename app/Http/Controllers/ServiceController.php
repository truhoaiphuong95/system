<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Core\Services\ServiceServiceContract;

class ServiceController extends Controller
{
    protected $service; 

    public function __construct(ServiceServiceContract $service)
    {
        $this->service = $service;
    }

    public function getList()
    {
        $data['services'] = $this->service->getList();
        return view('service-list', $data);
    }

    public function getAdd()
    {
        return view('service-add');
    }

    public function postAdd(Request $req)
    {
        $data['service'] = $this->service->store($req);
        return redirect()->route('staff.service.list.get');
    }

    public function getEdit($service_id)
    {
        $data['service'] = $this->service->find($service_id);
        return view('service-edit', $data);
    }

    public function postEdit($service_id, Request $req)
    {
        $data['service'] = $this->service->update($service_id, $req);
        return redirect()->route('staff.service.list.get');
    }

    public function getDelete($service_id)
    {
        $this->service->destroy($service_id);
        return redirect()->route('staff.service.list.get');
    }
}

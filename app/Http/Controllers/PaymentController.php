<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Models\Payment;
use App\Models\Staff;
use App\Models\Field;
use App\Models\Branch;
use Core\Services\PaymentServiceContract;
use Core\Services\ClientServiceContract;

class PaymentController extends Controller
{
    protected $model;
    protected $service;
    public function __construct(payment $model, PaymentServiceContract $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function getAdd($client_id, ClientServiceContract $client_service) {
        $data['client'] = $client_service->find($client_id);
        $data['branches'] = branch::all();
        $data['staffs'] = staff::all();
        $data['fields'] = field::all();
        return view('payment-add', $data);
    }

    public function getAddmore(ClientServiceContract $client_service) {
        $data['branches'] = branch::all();
        $data['staffs'] = staff::all();
        $data['fields'] = field::all();
        return view('payment-addmore', $data);
    }
    
    public function postAdd(Request $req) 
    {
        $payment_id = $this->service->store($req);
        return redirect()->route('staff.payment.view.get', ['payment_id' => $payment_id]);
    }
    
    public function getEdit($payment_id)
    {
        $data['payment'] = $this->service->find($payment_id);
        $data['branches'] = branch::all();
        $data['staffs'] = staff::all();
        $data['fields'] = field::all();
        return view('payment-edit', $data);
    }

    public function postEdit($payment_id, Request $req) 
    {
        $payment_id = $this->service->update($payment_id, $req);
        return redirect()->route('staff.payment.view.get', ['payment_id' => $payment_id]);
    }
    
    public function getList() {
        $data['payments'] = $this->service->getList();
        return view('payment-list', $data);
    }

    public function getListbyField($field_id)
    {
        $data['payments'] = $this->service->getListbyField($field_id);
        return view('payment-list', $data);
    }
    
    public function getView($payment_id) {
        $data['payment'] = payment::findOrFail($payment_id);
        return view('payment-view', $data);
    }
    
    public function getPrint($payment_id) {
        $data['payment'] = payment::findOrFail($payment_id);
        return view('payment-print', $data);
    }

    public function getDestroy($payment_id)
    {
        $this->service->destroy($payment_id);
        return redirect()->route('staff.payment.list.get');
    }
}

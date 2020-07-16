<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Core\Services\ReceiptServiceContract;
use Core\Services\ClientServiceContract;
use App\Http\Requests;
use App\Models\Client;
use App\Models\Receipt;
use App\Models\Field;
use App\Models\Staff;
use App\Models\Branch;

class ReceiptController extends Controller
{
    protected $model;
    protected $service;
    public function __construct(receipt $model, ReceiptServiceContract $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function getAdd($client_id, ClientServiceContract $client_service) {
        $data['client'] = $client_service->find($client_id);
        $data['branches'] = branch::all();
        $data['staffs'] = staff::all();
        $data['fields'] = field::all();
        return view('receipt-add', $data);
    }
    
    public function postAdd(Request $req) 
    {
        $receipt_id = $this->service->store($req);
        return redirect()->route('staff.receipt.view.get', ['receipt_id' => $receipt_id]);
    }
    
    public function getList() {
        $data['receipts'] = $this->service->getList();
        return view('receipt-list', $data);
    }

    public function getListbyField($field_id)
    {
        $data['receipts'] = $this->service->getListbyField($field_id);
        return view('receipt-list', $data);
    }
    
    public function getView($receipt_id) {
        $data['receipt'] = receipt::findOrFail($receipt_id);
        return view('receipt-view', $data);
    }
    
    public function getPrint($receipt_id) {
        $data['receipt'] = receipt::findOrFail($receipt_id);
        return view('receipt-print', $data);
    }

    public function getEdit($receipt_id)
    {
        $data['receipt'] = $this->service->find($receipt_id);
        $data['branches'] = branch::all();
        $data['staffs'] = staff::all();
        $data['fields'] = field::all();
        return view('receipt-edit', $data);
    }

    public function postEdit($receipt_id, Request $req)
    {
        $data['receipt'] = $this->service->update($receipt_id, $req);
        return redirect()->route('staff.receipt.view.get', ['receipt_id' => $receipt_id]);
    }

    public function getDestroy($receipt_id)
    {
        $this->service->destroy($receipt_id);
        return redirect()->route('staff.receipt.list.get');
    }
}

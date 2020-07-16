<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Receipt;
use App\Models\Payment;
use App\Models\Field;

class FinancialController extends Controller
{
    public function getOverview() {
    	$data['receipts'] = receipt::all();
    	$data['payments'] = payment::all();
    	$data['revenue'] = $data['receipts']->sum('sotien');
    	$data['cost'] = $data['payments']->sum('sotien');
    	return view('financial-overview', $data);
    }


    public function getField($field_id) {
    	$field = field::findOrFail($field_id);
    	$data['receipts'] = $field->rlsPhieuthu;
    	$data['payments'] = $field->rlsPhieuchi;
    	$data['revenue'] = $data['receipts']->sum('sotien');
    	$data['cost'] = $data['payments']->sum('sotien');
    	return view('financial-overview', $data);
    }
}

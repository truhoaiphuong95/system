<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\CourseStudent;
use App\Models\Ticket;
use App\Models\Receipt;
use App\Models\Payment;
use App\Models\Field;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public function getFinance()
    {
        $data['ticket_sum'] = Ticket::whereYear('created_at', '=', Carbon::now()->year)->get()->count();

        for($i=0; $i<12; $i++) {
            $ticket_count[$i] = Ticket::whereYear('created_at', '=', Carbon::now()->year)
              ->whereMonth('created_at', '=', $i+1)
              ->get()->count();
        }
        $thismonth = $ticket_count[Carbon::now()->month-1];
        $lastmonth = $ticket_count[Carbon::now()->month-2];
        $data['ticket_growth'] = round((($thismonth / $lastmonth) - 1)*100, 2);
        $data['ticket_count'] = $ticket_count;

        $data['student_sum'] = CourseStudentwhereYear('created_at', '=', Carbon::now()->year)->get()->count();

        for($i=0; $i<12; $i++) {
            $student_count[$i] = CourseStudentwhereYear('created_at', '=', Carbon::now()->year)
              ->whereMonth('created_at', '=', $i+1)
              ->get()->count();
        }
        $thismonth = $student_count[Carbon::now()->month-1];
        $lastmonth = $student_count[Carbon::now()->month-2];
        $data['student_growth'] = round((($thismonth / $lastmonth) - 1)*100, 2);
        $data['student_count'] = $student_count;

        $fields = field::all();
        foreach($fields as $f => $field) {
            $payment_sum[$f] = Payment::whereYear('created_at', '=', Carbon::now()->year)->where('field_id', $field->id)->get()->sum('amount');
            $receipt_sum[$f] = Receipt::whereYear('created_at', '=', Carbon::now()->year)->where('field_id', $field->id)->get()->sum('amount');

            for($i=0; $i<12; $i++) {
                $field_receipt_count[$i] = Receipt::whereYear('created_at', '=', Carbon::now()->year)->where('field_id', $field->id)
                    ->whereMonth('created_at', '=', $i+1)
                    ->get()->sum('amount');
                $field_payment_count[$i] = Payment::whereYear('created_at', '=', Carbon::now()->year)->where('field_id', $field->id)
                    ->whereMonth('created_at', '=', $i+1)
                    ->get()->sum('amount');
            }
            $receipt_count[$f] = $field_receipt_count;
            $payment_count[$f] = $field_payment_count;

            $receipt_thismonth = $field_receipt_count[Carbon::now()->month-1];
            $receipt_lastmonth = $field_receipt_count[Carbon::now()->month-2];
            $receipt_growth[$f] = (0==$receipt_lastmonth)? 100 : round((($receipt_thismonth / $receipt_lastmonth) - 1)*100, 2);

            $payment_thismonth = $field_payment_count[Carbon::now()->month-1];
            $payment_lastmonth = $field_payment_count[Carbon::now()->month-2];
            $payment_growth[$f] = (0==$payment_lastmonth)? 100 : round((($payment_thismonth / $payment_lastmonth) - 1)*100, 2);
        }
        $data['payment_sum'] = $payment_sum;
        $data['receipt_sum'] = $receipt_sum;
        $data['receipt_count'] = $receipt_count;
        $data['payment_count'] = $payment_count;
        $data['receipt_growth'] = $receipt_growth;
        $data['payment_growth'] = $payment_growth;
        $data['fields'] = $fields;
        // dd($data);
        return view('statistic-finance', $data);
    }
}

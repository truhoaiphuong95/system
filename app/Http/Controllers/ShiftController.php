<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use App\Models\Shift;
use App\Models\Staff;

class ShiftController extends Controller
{
    private $sessionofday;
    private $dayofweek;
    private $days;
    private $current_days;
    private $next_stage;
    private $current_stage;

    public function __construct()
    {
        $this->sessionofday = array(
            'morning' => 'Buổi sáng', 
            'everning' => 'Buổi chiều', 
            'afternoon' => 'Buổi tối'
        );

        $this->dayofweek = array(
            'Thứ Hai', 
            'Thứ Ba', 
            'Thứ Tư', 
            'Thứ Năm', 
            'Thứ Sáu', 
            'Thứ Bảy',
            'Chủ Nhật'
        );

        $this->current_days = array();
        $now = strtotime('monday this week');
        for($i=0; $i<7; $i++) {
            $this->current_days[] = date('Y-m-d', $now);
            $now = strtotime('+1 day', $now);   
        }

        $this->next_days = array();
        $now = strtotime('monday next week');
        for($i=0; $i<7; $i++) {
            $this->next_days[] = date('Y-m-d', $now);
            $now = strtotime('+1 day', $now);   
        }

        $this->current_stage = array(
            date('Y-m-d', strtotime('monday this week')),
            date('Y-m-d', strtotime('sunday this week'))
        );

        $this->next_stage = array(
            date('Y-m-d', strtotime('monday next week')),
            date('Y-m-d', strtotime('sunday next week'))
        );
    }

    public function expired()
    {
        $now = strtotime('now');
        $expire = strtotime('-4 hour', strtotime('sunday this week'));
        return $now > $expire;
    }

    public function groupBySessionAndDay($shifts)
    {
        $shifts_grouped = $shifts->groupBy('session')->transform(function($item) {
            return $item->groupBy('date');
        });

        return $shifts_grouped;
    }

    public function getRegister()
    {
        if ($this->expired()) 
            return redirect()->route('staff.shift.view.get')->withErrors('Đã hết thời hạn đăng ký.');
        
        $shifts = Shift::whereBetween('date', $this->next_stage)->where('staff_id', UserInfo()->id)->get();
        $shifts_grouped = $this->groupBySessionAndDay($shifts);
        if($shifts->count() >  0) 
            $data['warning'] = 'Bạn đã hoàn tất đăng ký ca trước đó, nếu bạn nhấn Lưu lịch trước đó sẽ bị xoá.';

        $data['next_shifts'] = $shifts_grouped;
        $data['next_days'] = $this->next_days;
        $data['sessionofday'] = $this->sessionofday;
        $data['dayofweek'] = $this->dayofweek;
        return view('shift-register', $data);
    }

    public function postRegister(Request $req)
    {
        $shifts = Shift::whereBetween('date', $this->next_stage)->where('staff_id', UserInfo()->id)->delete();

        $now = strtotime('monday next week');
        for($i=0; $i<7; $i++) {
            foreach($this->sessionofday as $s => $session) {
                if($req->checkbox[$i][$s] == 0) continue; //nếu không check thì bỏ qua
                $data['staff_id'] = UserInfo()->id; 
                $data['date'] = date('Y-m-d', $now);
                $data['session'] = $s;
                Shift::create($data);
            }
            $now = strtotime('+1 day', $now);   
        }

        return redirect()->route('staff.shift.view.get')->with('success', 'Đăng ký ca thành công!');
    }

    public function getManager()
    {
        if (!$this->expired()) 
            $data['warning'] = 'Chưa hết thời hạn đăng ký, mọi người có thể còn thay đổi, lưu ý khi xếp ca vào lúc này!';

        $shifts = Shift::whereBetween('date', $this->next_stage)->with('staff')->get();
        $shifts_grouped = $this->groupBySessionAndDay($shifts);

        $data['sessionofday'] = $this->sessionofday;
        $data['dayofweek'] = $this->dayofweek;
        $data['next_days'] = $this->next_days;
        $data['allshift'] = $shifts_grouped;

        return view('shift-manager', $data);
    }

    public function postManager(Request $req)
    {
        $accepts = $req->accept;

        foreach($accepts as $a => $accept) {
            $shift = Shift::findOrFail($a);
            $shift->update(['is_accept' => $accept]);
        }

        return redirect()->route('staff.shift.view.get')->with('success', 'Lưu lịch làm thành công!');
    }

    public function getView()
    {
        $shifts = Shift::whereBetween('date', $this->next_stage)->where('is_accept', true)->with('staff')->get();
        $next_shifts_grouped = $this->groupBySessionAndDay($shifts);

        $data['sessionofday'] = $this->sessionofday;
        $data['dayofweek'] = $this->dayofweek;
        $data['next_days'] = $this->next_days;
        $data['next_shifts'] = $next_shifts_grouped;

        $shifts = Shift::whereBetween('date', $this->current_stage)->where('is_accept', true)->with('staff')->get();
        $current_shifts_grouped = $this->groupBySessionAndDay($shifts);

        $data['current_days'] = $this->current_days;
        $data['current_shifts'] = $current_shifts_grouped;

        return view('shift-view', $data);
    }
}

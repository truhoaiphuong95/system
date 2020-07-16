<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Core\Repositories\CourseRepositoryContract;

class CourseStudentListExport implements FromCollection, WithHeadings
{
    use Exportable;
    protected $student_arr;
    
    public function __construct($course)
    {
        $students = $course->courseStudents;
        $student_arr = array(array());
        foreach ($students as $i => $student) {
            $student_arr[$i]['name'] = $student->client->name;
            $student_arr[$i]['phone'] = $student->client->phone;
            $student_arr[$i]['email'] = $student->client->email;
            $student_arr[$i]['deal_rate'] = $student->deal_rate;
            $student_arr[$i]['deal_note'] = $student->deal_note;
            $student_arr[$i]['tuition_done'] = $student->tuition_done;
        }

        $this->student_arr = $student_arr;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->student_arr);
    }

    public function headings(): array
    {
        return [
            'Họ và tên',
            'Số điện thoại',
            'Email',
            'Mức ưu đãi',
            'Chương trình ưu đãi',
            'Đã đóng',
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseStudent extends Model
{
    public $timestamps = true;
    protected $table = 'course_students';
    protected $dates = ['deleted_at'];
    public $fillable = ['client_id', 'course_id', 'deal_rate', 'deal_note', 'tuition_done', 'note'];
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}

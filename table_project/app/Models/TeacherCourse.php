<?php

namespace App\Models;
use App\Models\Teacher;
use App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    use HasFactory;

    protected $table ="teacher_course";
    protected $primaryKey = "id";
    public $timestamps = false;

    function teacher()
    {
        return $this->belongsTo(Teacher::class,'t_id','t_id');
    }

    function course()
    {
        return $this->belongsTo(Course::class,'d_id','d_id');
    }
}



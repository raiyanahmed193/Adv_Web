<?php

namespace App\Models;
use  App\Models\Department;
use App\Models\TeacherCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table ="teachers";
    protected $primaryKey = "t_id";
    public $timestamps = false;

    function department()
    {
        return $this->belongsTo(Department::class,'d_id','d_id');
    }

    function courseTeacher()
    {
        return $this->hasMany(TeacherCourse::class,'t_id','t_id');
    }
}

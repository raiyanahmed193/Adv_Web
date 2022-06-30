<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Department;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\TeacherCourse;
use App\Models\StudentCourse;

class TableController extends Controller
{
    function home()
    {
        return view('table.home');
    }

    function dashboard()
    {
        $data = Department::where('d_id','=','1')->get();
        $teacher = Teacher::all();
        $course = Course::all();
        $tc = TeacherCourse::where('c_id','=','2')->get();
        return view('table.dashboard')
        ->with('department',$data)
        ->with("teacher",$teacher)
        ->with("course",$course)
        ->with('t_c',$tc);


       
    }

    
}

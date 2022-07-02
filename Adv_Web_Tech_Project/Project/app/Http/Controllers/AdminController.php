<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\mail;
use App\Models\User;
use App\Mail\mailHelperClass;
use App\Models\Tutor;
use App\Models\Student;
use CreateStudentsTable;

class AdminController extends Controller
{
    function home()
    {   
        return view('admin.home');
    }
    function tutor($id){

        $Tutors = Tutor::where('id',$id)->first();
         
         return view('admin.teacherdetails')
         ->with('Tutor',$Tutors);
     }
 function tlist(){
         $Tutors = Tutor::all();
         return view('admin.TList')
                ->with('Tutors',$Tutors);
     }
     function student($id){

        $Students = Student::where('id',$id)->first();
         
         return view('admin.studentdetails')
         ->with('Student',$Students);
     }
 function slist(){
         $Students = Student::all();
         return view('admin.SList')
                ->with('Students',$Students);
     }
}

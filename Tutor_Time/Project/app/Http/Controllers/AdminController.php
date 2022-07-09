<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\mail;
use App\Models\Application;
use App\Models\Admin;
use App\Models\Feedback;
use App\Models\Otp;
use App\Models\STC_mapping;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\TeacherReview;
use App\Mail\mailHelperClass;
use CreateStudentsTable;

class AdminController extends Controller
{
    function main()
    {
        if(session()->has('adminusername'))
        {
            return redirect()->route('admin.home');
        }
        return view('mainpage');
    }

    function adlogin()
    {
        if(session()->has('adminusername'))
        {
            return redirect()->route('admin.home');
        }
        return view('admin.adlogin');
    }

    function adloginSubmit(Request $req)
    {
        $req->validate
        ([
            'username' => 'required',
            'password'=> 'required',
        ]);

        $admin = Admin::where('username',$req->username)->where('password',$req->password)->first();
        $us = array($admin);

        if($us[0] === null)
        {
            return redirect()->route('admin.adlogin');
        }
        else
        {
            $req->session()->put('adminusername', $us[0]->username);
            $req->session()->put('adminpassword', $us[0]->password);
 
            return redirect()->route('admin.home');
        }
    }
    function home()
    {
        if(session()->has('adminusername'))
        {
            return view('admin.home');
        }
        return redirect()->route('admin.adlogin');
    }

    function tutor($tutor_id)
    {
        if(session()->has('adminusername'))
        {
            $Tutors = Tutor::where('tutor_id',$tutor_id)->first();
        
            return view('admin.teacherdetails')
            ->with('Tutor',$Tutors);
        }
        return redirect()->route('admin.adlogin');
    }

    function tlist()
    {
        if(session()->has('adminusername'))
        {
            $Tutors = Tutor::all();
        
            return view('admin.TList')
            ->with('Tutors',$Tutors);
        }
        return redirect()->route('admin.adlogin');
        
    }

    function student($student_id)
    {
        if(session()->has('adminusername'))
        {
            $Students = Student::where('student_id',$student_id)->first();
        
            return view('admin.studentdetails')
            ->with('Student',$Students);
        }
        return redirect()->route('admin.adlogin');
    }

    function slist()
    {
        if(session()->has('adminusername'))
        {
            $Students = Student::all();

            return view('admin.SList')
            ->with('Students',$Students);
        }
        return redirect()->route('admin.adlogin');
            
    }

    function delete($tutor_id)
    {
        if(session()->has('adminusername'))
        {
            $Tutors= Tutor::where('tutor_id',$tutor_id)->delete();
            return back();
        }
        return redirect()->route('admin.adlogin');
        
    }

    function remove($student_id)
    {
        if(session()->has('adminusername'))
        {
            $Students= Student::where('student_id',$student_id)->delete();
            return back();
        }
        return redirect()->route('admin.adlogin');        
    }

    function logout()
    {
        session()->flush();
        return redirect()->route('admin.adlogin');
    }

      /** 
   *  @param Integer $user_id
   * @param Integer $status_code
   * @return sucess Response
   * */
  function updateStatus($student_id,$status_code)
  {
    $update_Students = Student::where('student_id',$student_id)->update(['status' => $status_code]);
    
    if($update_Students>0)
    {
        return back();
        session()->flash('msg1','Edit Successfull');
    }
    else
    {
        return back();
    }
              
      
  }
}

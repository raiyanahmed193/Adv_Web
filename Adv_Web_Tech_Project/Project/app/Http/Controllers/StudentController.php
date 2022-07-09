<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\mail;
use App\Models\Application;
use App\Models\Student;
use App\Models\Feedback;
use App\Models\Teacherfeedback;
use App\Models\Tutor;
use App\Models\TeacherReview;
use App\Mail\NotifyMail;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{

    function mainpage()
    {
        return view('student.mainpage');
    }

    function register()
    {
       return view('student.register');
    }

    function login()
    {
        return view('student.login');
    }

    function adddata(Request $reg)
    {
     $this->validate($reg,
     [
         'name'=>'required|regex:/^[\pL\s\-]+$/',
         'username'=>'required|min:6|unique:students,username',
         'email'=>'required',
         'address'=>'required',
         "password"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8",
         "phone"=>"required|regex:/^([0]{1}[1]{1}[0-9]{9})+$/i",
         
    
     ],
     [
         "name.required"=> "Please provide Your name",
         "name.regex"=> "Name is alphabetic",
         "password.required"=> "Please provide Password",
         "password.regex"=>"Password must contain upper case, lower case, number and special characters",
         "password.min"=>"Password must be Longer than 7 characters",
         "phone.regex"=>"Invalid Phone Number Format"
    
     ]
       );
       
        $std = new Student();
        $std->name=$reg->name;
        $std->username=$reg->username;
        $std->email=$reg->email;
        $std->phone=$reg->phone;
        $std->address=$reg->address;
        $std->desc=$reg->desc;
        $std->password=$reg->password;
      
        $std->save();
        return redirect()->route('student.login');
    }


    function userLogin( Request $req)
{
 $this->validate($req,
 [
     'username'=>'required|exists:students,username',
     "password"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8"
 ],
 [
     "password.required"=> "Please provide Password",
     "password.min"=>"Password must be Longer than 7 characters",
     "password.regex"=>"Password must contain upper case, lower case, number and special characters"
     

 ]
   );

   $check = Student::where('username',$req->username)
   ->where('password',$req->password)->first();

   if($check){
    //

    session()->put('user',$check->username);
    session()->put('id',$check->student_id);
    session()->put('name',$check->name);
    session()->put('phone',$check->phone);
    session()->put('email',$check->email);
    session()->put('location',$check->address);
    session()->put('desc',$check->desc);
    session()->put('password',$check->password);
    return redirect()->route('student.mainpage');
}
else{
    session()->flash('msg','Username and password is invalid');
    return back();
}

   
    

}


function logout(){
   
    session()->forget('user');
    return redirect()->route('student.login');
}

function sendMail()
    {         
        Mail::to(['raiyanahmedmahir@gmail.com'])->send(new NotifyMail('Verification',rand(100000,999999)));
        return "Email sent Successfully";
    }


    function application()
    {
        return view('student.application');
    }

    function  addPost(Request $reg)
    { 
        $this->validate($reg,
     [
         'name'=>'required',
         'subject'=>'required',
         'days'=>'required|regex:/^[0-9]+$/',
         'location'=>'required',
         "salary"=>"required|regex:/^[0-9]+$/",
         "Time"=>"required",
         
    
     ],
     [
         "name.required"=> "Please provide Your name",
         "days.regex"=> "Only Number",
         "salary.regex"=> "Only Number",
         
    
     ]
       );
        $app = new Application();
        $app->name=$reg->name;
        $app->subject=$reg->subject;
        $app->days=$reg->days;
        $app->location=$reg->location;
        $app->salary=$reg->salary;
        $app->Time=$reg->Time;
        $app->cond='r';
        $app->save();
        session()->flash('msg','Post Successfull');
        return back();

    }

    function appfeedback()
    {
         return view('student.appfeedback');
    }

    function addfeedback(Request $reg)
    {
        $this->validate($reg,
        [
            'username'=>'required',
            'feedback'=>'required',
            'rating'=>'required',
            
            
       
        ],
       
          );
          
           $feed = new Feedback();
           $feed->username=$reg->username;
           $feed->feedback=$reg->feedback;
           $feed->rating=$reg->rating;
           $feed->save();
           session()->flash('msg','Post Successfull');
           return back();
    }

    function userprofile()
    {
        return view('student.profile');
    }

    

    function editprofile()
    {
        
         
        return view('student.editprofile');
       
    }

    function profileupdate(Request $reg)
    {
        $this->validate($reg,
     [
         'name'=>'required|regex:/^[\pL\s\-]+$/',
         'username'=>'required|min:6',
         'email'=>'required',
         'address'=>'required',
         "password"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8",
         "phone"=>"required|regex:/^([0]{1}[1]{1}[0-9]{9})+$/i",
         
    
     ],
     [
         "name.required"=> "Please provide Your name",
         "name.regex"=> "Name is alphabetic",
         "password.required"=> "Please provide Password",
         "password.regex"=>"Password must contain upper case, lower case, number and special characters",
         "password.min"=>"Password must be Longer than 7 characters",
         "phone.regex"=>"Invalid Phone Number Format",
    
     ]
       );
       
        $st = new Student();
        $st = Student::where('username',session()->get('user'))
        ->update(['name'=>$reg->name,'username'=>$reg->username,'phone'=>$reg->phone,'email'=>$reg->email,'address'=>$reg->address,
    'desc'=>$reg->desc,'password'=>$reg->password]);

    session()->put('user',$reg->username);
    session()->put('name',$reg->name);
    session()->put('phone',$reg->phone);
    session()->put('email',$reg->email);
    session()->put('location',$reg->address);
    session()->put('desc',$reg->desc);
    session()->put('password',$reg->password);
      
       
        session()->flash('msg','Edit Successfull');
        return back();
    }

     function review()
     {

        $data= Feedback::all();

         return view('student.review')->with('data',$data);
     }

     function contact()
     {
         return view('student.contact');
     }

     function about()
     {
         return view('student.about');
     }

     function teacherlist()
     {
        $Tutors = Tutor::all();
        return view('student.teacherlist')
               ->with('Tutors',$Tutors);
     }

     function tutor($id)
     {
        $Tutors = Tutor::where('tutor_id',$id)->first();
         
        return view('student.tutor')
        ->with('Tutors',$Tutors);
     }

     function teacherfeedback(Request $reg)
    {
        $this->validate($reg,
        [
            'student_id'=>'required',
            'tutor_id'=>'required',
            'tutor_name'=>'required',
            'feedback'=>'required',
            'rating'=>'required',
            
            
       
        ],
       
          );
          
           $feed = new TeacherReview();
           $feed->student_id=$reg->student_id;
           $feed->tutor_id=$reg->tutor_id;
           $feed->tutor_name=$reg->tutor_name;
           $feed->feedback=$reg->feedback;
           $feed->rating=$reg->rating;
           $feed->save();
           session()->flash('msg','Review Done');
           return back();
    }

}




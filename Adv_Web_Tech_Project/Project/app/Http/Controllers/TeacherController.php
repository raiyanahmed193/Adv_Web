<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\mail;
use App\Models\Application;
use App\Models\Feedback;
use App\Models\Otp;
use App\Models\STC_mapping;
use App\Models\Student;
use App\Models\Tutor;
use App\Mail\mailHelperClass;


class TeacherController extends Controller
{
    function logout()
    {
        if(session()->has('email'))
        {
            session()->flush();
        }
        return redirect()->route('login');
    }

    function home()
    {
        if(session()->has('email'))
        {
            $value1 = session()->get('name');
            $value2 = session()->get('type');

            return view('tutor.home')
            ->with('name1',$value1)
            ->with('type1',$value2);
        }
        return redirect()->route('logout');
    }

    function login()
    {
        if(session()->has('email'))
        {
            return redirect()->route('root');
        }
        return view('tutor.login');
    }

    function create()
    {
        /*if(session()->has('email'))
        {
            return redirect()->route('root');
        }*/
        return view('tutor.create');
    }

    function loginSubmit(Request $req)
    {
        $req->validate(
            [
               "email"=>"required",
               "password"=>"required"
            ],[]
           );

        $users = User::all();
        $users = User::where('email',$req->email)->where('password',$req->password)->select('name','email','type')->first();

        $us = array($users);

        if($us[0] === null)
        {
            return redirect()->route('login');
            
        }
        else
        {
            $p = $req->input();
            $req->session()->put('email', $us[0]->email);
            $req->session()->put('name', $us[0]->name);
            $req->session()->put('type', $us[0]->type);
 
            return redirect()->route('root');
        }
    }

    function createSubmit(Request $req)
    {
        $req->validate(
             [
                "name"=>["required","regex:/^[\pL\s]+$/u"],
                "username"=>["required","unique:tutors,username"],
                "email"=>["required","regex:/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/"],
                "gender"=>["required"],
                "phone"=>["required","regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/"],
                "password"=>["required","min:8","regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/"],
                "cpassword"=>["required","same:password"]
             ],
             [
                "name.regex"=> "Name must be alphabetic",
                "username.unique"=> "Username has been taken",
                "password.min"=> "Password has to be more than 8 characters",
                "email.regex"=> "Email is invalid",
                "phone.regex"=> "Phone number is invalid",
                "password.regex"=> "Password must contain upper case, lower case, number and special 
                characters",
                "cpassword.same"=> "Passwords do not match!"
             ]
            );

        $req->session()->put('email', $req->email);
        $req->session()->put('name', $req->name);
        $req->session()->put('username', $req->username);
        $req->session()->put('gender', $req->gender);
        $req->session()->put('phone', $req->phone);
        $req->session()->put('password', $req->password);
        
        /*
        $t1 = new Tutor();
        $t1->name = $req->name;
        $t1->username = $req->username;
        $t1->gender = $req->gender;
        $t1->phone = $req->phone;
        $t1->email = $req->email;
        $t1->password = $req->password;
        $t1->save();*/


        return redirect()->route('verify');
    }

    function verify()
    {
        $otp = rand(100000,999999);

        Mail::to(session()->get('email'))->send(new mailHelperClass('Account Verification',$otp));

        $o1 = new Otp();
        $o1->otp = $otp;
        $o1->save();

        return view('tutor.verifymail');
        
        /*
        $t1 = new Tutor();
        $t1->name = $req->name;
        $t1->username = $req->username;
        $t1->gender = $req->gender;
        $t1->phone = $req->phone;
        $t1->email = $req->email;
        $t1->password = $req->password;
        $t1->save();*/

    }
    
    function verifySubmit(Request $req)
    {
        $req->validate(
            [
               "otp"=>["required"],
            ],[]
           );

        $ot = Otp::all();
        $ot = Otp::where('otp', $req->otp)->delete();

        if($ot>0)
        {
            $t1 = new Tutor();
            $t1->name = session()->get('name');;
            $t1->username = session()->get('username');;
            $t1->gender = session()->get('gender');;
            $t1->phone = session()->get('phone');;
            $t1->email = session()->get('email');;
            $t1->password = session()->get('password');;
            $t1->save();
            return "Success:     ".$ot;
        }
        else
        {
            return "Failure!";
        }
           
       
        
        /*
        $t1 = new Tutor();
        $t1->name = $req->name;
        $t1->username = $req->username;
        $t1->gender = $req->gender;
        $t1->phone = $req->phone;
        $t1->email = $req->email;
        $t1->password = $req->password;
        $t1->save();*/

        //return redirect()->route('verify');
    }

    function list()
    {
        if(session()->has('email'))
        {
            $users = User::all();
            $users = User::where('id','<>','-1')->select('id','name')->get();
            
            return view('tutor.userlist')
                ->with('users',$users);
        }
        else
        {
            return redirect()->route('logout');
        }
    }

    function details($id)
    {
        if(session()->has('email'))
        {
            $users = User::all();
            $users = User::where('id',$id)->select('id','name','email','type')->first();
            
            return view('tutor.userdetails')
                ->with('u',$users);
        }
        else
        {
            return redirect()->route('logout');
        }        
    }

    function sendMail()
    {         
        Mail::to(['jestrixs@gmail.com'])->send(new mailHelperClass('Verification',rand(100000,999999)));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class UserController extends Controller
{
   function home()
   {
       return view('user.home');
   }

   function register()
   {
       return view('user.register');
   }

   function login()
   {
       return view('user.login');
   }

   function userLogin( Request $req)
   {
    $this->validate($req,
    [
        'email'=>'required|unique:users,email',
        "password"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8"
    ],
    [
        "password.required"=> "Please provide Password",
        "password.min"=>"Password must be Longer than 7 characters",
        "password.regex"=>"Password must contain upper case, lower case, number and special characters"
        

    ]
      );
       return $req->input();

   }

   function adddata(Request $reg)
   {
    $this->validate($reg,
    [
        'name'=>'required|regex:/^[\pL\s\-]+$/',
        'email'=>'required|unique:users,email',
        "password"=>"required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/|min:8"
    ],
    [
        "name.required"=> "Please provide Product name",
        "name.regex"=> "Name is alphabetic",
        "password.required"=> "Please provide Password",
        "password.regex"=>"Password must contain upper case, lower case, number and special characters",
        "password.min"=>"Password must be Longer than 7 characters"

    ]
      );
      
       $member = new Member;
       $member->name=$reg->name;
       $member->email=$reg->email;
       $member->password=$reg->password;
       $member->save();
       return redirect()->route('home');
   }

   function dashboard()
   {
    
       $data = Member::all();
       return view('user.dashboard',['members'=>$data]);
   }


  
}

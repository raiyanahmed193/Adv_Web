<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\AdminController;
use App\Mail\NotifyMail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
Tutor---------Arabi
*/
//Route::get('/',[TeacherController::class,'home'])->name('root');

Route::get('/betutor',[TeacherController::class,'create'])->name('register');

Route::get('/verification',[TeacherController::class,'verify'])->name('verify');
Route::post('/verification',[TeacherController::class,'verifySubmit'])->name('verify');

Route::post('/betutor',[TeacherController::class,'createSubmit'])->name('registersubmit');

Route::get('/tutorlogin',[TeacherController::class,'login'])->name('login');

Route::get('/dashboard',[TeacherController::class,'list'])->name('dashboard');
Route::get('/user/details/{id}',[TeacherController::class,'details'])->name('userdetails');
Route::get('/logi',[TeacherController::class,'logout'])->name('logout');

Route::get('/email',[TeacherController::class,'sendMail'])->name('send');












/*
Student---------Raiyan
*/






    Route::get('/register',[StudentController::class,'register'])->name('student.register');
    Route::post('/register',[StudentController::class,'adddata']);
    Route::get('/login',[StudentController::class,'login'])->name('student.login');
    Route::post('/login',[StudentController::class,'userLogin']);
    Route::get('/mainpage',[StudentController::class,'mainpage'])->name('student.mainpage')->middleware('auth.user');
    Route::get('/logout',[StudentController::class,'logout']);
    Route::get('/sendmail',[StudentController::class,'sendmail'])->name('student.mail')->middleware('auth.user');
    Route::get('/application',[StudentController::class,'application'])->name('student.application')->middleware('auth.user');
    Route::post('/addPost',[StudentController::class,'addPost']);
    Route::get('/appfeedback',[StudentController::class,'appfeedback'])->name('student.appfeedback')->middleware('auth.user');
    Route::post('/addfeedback',[StudentController::class,'addfeedback']);
    Route::get('/userprofile',[StudentController::class,'userprofile'])->name('student.profile')->middleware('auth.user');
    Route::get('/editprofile',[StudentController::class,'editprofile'])->middleware('auth.user');
    Route::post('/editprofile',[StudentController::class,'profileupdate']);
    Route::get('/review',[StudentController::class,'review'])->name('student.review');
    Route::get('/contact',[StudentController::class,'contact'])->name('student.contact');
    Route::get('/about',[StudentController::class,'about'])->name('student.about');
    



   




















/*
Admin---------Faiza, Adrita
*/
Route::get('/admin',[AdminController::class,'Home'])->name('root');
Route::get('/teacherdetails',[AdminController::class,'tlist'])->name('Tutor.list');
Route::get('/tdetails/{id}/{name}/{email}',[AdminController::class,'tutor'])->name('Tutor.teacherdetails');
Route::get('/studentdetails',[AdminController::class,'slist'])->name('Student.list');
Route::get('/sdetails/{id}/{name}/{email}',[AdminController::class,'student'])->name('Student.studentdetails');

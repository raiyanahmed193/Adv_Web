<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\NotifyMail;

class SendEmailController extends Controller
{
    function sendMail()
    {         
        Mail::to(['raiyanahmedmahir@gmail.com'])->send(new NotifyMail('Verification',rand(100000,999999)));
    }
}

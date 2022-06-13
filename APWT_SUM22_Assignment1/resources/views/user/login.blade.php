@extends('layouts.notlog')
@section('content')
<center>
    <hr>
    <h1>
   Login Page
    </h1>
</hr>

<form action="/login" method="POST">
    @csrf 
    <input type="email" name="email" placeholder="Enter Your Email"> <br>
    @error('email')
        <span style="color:red">{{$message}}</span>
        @enderror<br><br>

        <input type="text" name="password" placeholder="Enter Password"> <br>
    @error('password')
        <span style="color:red">{{$message}}</span>
        @enderror<br><br>
    <button type="submit">Login</button>
</form>

</center>
@endsection
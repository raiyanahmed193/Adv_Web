@extends('layouts.notlog')
@section('content')
<center>
    <hr>
    <h1>
    Registration Page
    </h1>
</hr>

<form action="/register" method="POST">
    @csrf 
    <input type="text" name="name" placeholder="Enter Your Name"> <br> <br>
    @error('name')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br>
    <input type="email" name="email" placeholder="Enter Your Email"> <br> <br>
    @error('email')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br>

        <input type="text" name="password" placeholder="Enter Password"> <br> <br>
    @error('password')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br>
    <button type="submit">Submit</button>
</form>

</center>
@endsection
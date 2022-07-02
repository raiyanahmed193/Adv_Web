@extends('layouts.navbar2')
@section('content')
<center>
    <hr>
    <h1>
    Post Page
    </h1>
</hr>

<h4>{{Session::get('msg')}}</h4>
<form action="/addPost" method="POST">
    @csrf 
    <input type="text" name="name" value={{session()->get('user')}}> <br> <br>
    @error('name')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br>
        <input type="text" name="subject" placeholder="Enter Subject Name"> <br> <br>
    @error('subject')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br>    
        <input type="text" name="days" placeholder="Enter Days/week"> <br> <br>
    @error('days')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br>    
    <input type="text" name="location" value={{session()->get('location')}} > <br> <br>
    @error('location')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br>
        <input type="text" name="salary" placeholder="Enter Salary"> <br> <br>
    @error('salary')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br>
        <input type="time" name="Time"><br> <br>
    @error('Time')
        <span style="color:red">{{$message}}</span><br>
        @enderror<br> 
       <button type="submit">Submit</button>
</form>

</center>
@endsection






@extends('layout.main2')
@section('content')
<html>
    <head></head>
    <body>
        <div>
        <h1 align='center'>Welcome Admin</h1>
        </div>
        <div style="font-size: 20px" align="center"><a href="/teacherdetails">Tutor</a><br>
        <br>
        <a href="/studentdetails">Student</a>
        </div>
        @yield('content')
    </body>
</html>
@endsection
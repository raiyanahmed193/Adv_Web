@extends('layout.main2')
@section('content')
<h1 align='center'>Show Details</h1>
Id: {{$Student->student_id}}<br><br>
Name:{{$Student->name}}<br><br>
Email:{{$Student->email}}<br><br>

@endsection
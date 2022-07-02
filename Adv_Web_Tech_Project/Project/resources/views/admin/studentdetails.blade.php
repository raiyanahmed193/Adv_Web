@extends('layout.main2')
@section('content')
<h1 align='center'>Show Details</h1>
Name:{{$student->name}}<br><br>
Id: {{$student->id}}<br><br>
Email: {{$student->email}}<br><br>
@endsection
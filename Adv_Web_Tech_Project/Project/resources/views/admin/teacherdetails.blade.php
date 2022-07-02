@extends('layout.main2')
@section('content')
<h1 align='center'>Show Details</h1>
Name:{{$tutor->name}}<br><br>
Id: {{$tutor->id}}<br><br>
Email: {{$tutor->email}}<br><br>
@endsection
@extends('layout.main2')
@section('content')
<h2 align='center'>This is Tutor Details</h2>
<table border="1"align="center">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Id</th>
        </tr>
        @foreach($Tutors as $t)
            <tr>
                <td><a href="{{route('Tutor.teacherdetails',['id'=>$t->id,'name'=>$t->name])}}">{{$t->name}}</td>
                <td>{{$t->email}}</td>
                <td>{{$t->id}}</td>
            </tr>
        @endforeach
    </table>
    @endsection
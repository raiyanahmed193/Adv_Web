@extends('layout.main2')
@section('content')
<h2 align='center'>This is Student Details</h2>
<table border="1"align="center" width=70%>
        <tr>
            <th>Student Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        @foreach($Students as $s)
            <tr>
                <td><a href="{{route('Student.studentdetails',['id'=>$s->student_id,'name'=>$s->name,'email'=>$s->email])}}">{{$s->student_id}}</td>
                <td>{{$s->name}}</td>
                <td>{{$s->email}}</td>
                <td>{{$s->phone}}</td>
            </tr>
        @endforeach
    </table>
    @endsection
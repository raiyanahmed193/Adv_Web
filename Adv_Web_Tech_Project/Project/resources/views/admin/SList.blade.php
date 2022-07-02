@extends('layout.main2')
@section('content')
<h2 align='center'>This is Student Details</h2>
<table border="1"align="center">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Id</th>
            <th>Phone Number</th>
        </tr>
        @foreach($Students as $s)
            <tr>
                <td><a href="{{route('Student.sdetails',['id'=>$t->id,'name'=>$t->name])}}">{{$t->name}}</td>
                <td>{{$t->email}}</td>
                <td>{{$t->id}}</td>
                <td>{{$t->phone}}</td>
            </tr>
        @endforeach
    </table>
    @endsection
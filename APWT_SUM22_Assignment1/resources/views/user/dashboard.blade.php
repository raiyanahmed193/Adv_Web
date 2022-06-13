@extends('layouts.loggedin')
@section('content')
<center>
    <hr>
    <h1>
   Show list
    </h1>
</hr>
  
<table border="2" width=60%>
    <tr align="center">
        <td >No</td>
        <td>Name</td>
        <td>Email</td>
        <td>Password</td>
    </tr>

     @foreach($members as $member)
     <tr align="center">
        <td >{{$member['id']}}</td>
        <td>{{$member['name']}}</td>
        <td>{{$member['email']}}</td>
        <td>{{$member['password']}}</td>
    </tr>
     @endforeach

</table>

</center>
@endsection
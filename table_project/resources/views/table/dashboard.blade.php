@extends('layouts.nav')
@section('content')
<center>
    <hr>
    <h1>
   Show Details
    </h1>
</hr>
  
@foreach($department as $dp)
@foreach($dp->teacher as $tr)<td>{{$tr->t_name}}</td><br>@endforeach
@endforeach



<table border="2" width=60%>
    <tr align="center">
        <td >Teacher ID</td>
        <td>Teacher Name</td>
        <td>Department Name</td>
    </tr>

     @foreach($teacher as $tr)
     <tr align="center">
        <td >{{$tr->t_id}}</td>
        <td>{{$tr->t_name}}</td>
        <td>{{$tr->department->d_name}}</td>
    </tr>
     @endforeach

</table><br> <br>


<table border="2" width=60%>
    <tr align="center">
        <td >Course name</td>
        <td>Teacher  Name</td>
    </tr>

    @foreach($t_c as $tc)
     <tr align="center">
        <td >{{$tc->course->c_name}}</td>
        <td>{{$tc->teacher->t_name}}</td>

    </tr>
     @endforeach
</table>

@foreach($t_c as $tc)
{{$tc->teacher->t_name}}
@endforeach




</center>
@endsection

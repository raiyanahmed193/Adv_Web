<html>
    <head>
    </head>
    <body>
        
        <div>
        <a href="{{route('student.register')}}">Registration |</a>
        <a href="{{route('student.login')}}">Login |</a>
        <a href="{{route('student.review')}}">Review |</a>
        <a href="{{route('student.contact')}}">Contact Us |</a>
        <a href="{{route('student.about')}}">About Us</a>
        </div>
        @yield('content')
    </body>
</html>
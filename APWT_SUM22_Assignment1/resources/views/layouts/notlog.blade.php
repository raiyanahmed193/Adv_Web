<html>
    <head>
    </head>
    <body>
        
        <div>
        <a href="{{route('home')}}">Home |</a>
        <a href="{{route('register')}}">Registration |</a>
        <a href="{{route('login')}}">Login</a>
        </div>
        @yield('content')
    </body>
</html>
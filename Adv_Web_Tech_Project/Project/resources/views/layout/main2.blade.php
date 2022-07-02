<html>
    <head></head>
    <body>
        <div>
            <a href="{{route('login')}}">Login</a>
            <a href="{{route('register')}}">Registration</a>
            <a href="/admin">Admin</a>
            <br><br>
        </div>
        @yield('content')
    </body>
</html>
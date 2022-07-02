<html>
    <head></head>
    <body>
        <div>
            <a href="{{route('root')}}">Home</a>
            <a href="{{route('dashboard')}}">User List</a>
            <a href="{{route('logout')}}">Sign Out</a>
            <br><br>
        </div>
        @yield('content')
    </body>
</html>
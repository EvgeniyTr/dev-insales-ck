<html>
    <head>
        @yield('favicon')
        <title>@yield('title')</title>
        @yield('css')
        @yield('js')
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="sidebar">
            @yield('sidebar')
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
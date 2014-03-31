<!DOCTYPE html>
<html>
<head>
    <title>
        Yoda Page
    </title>
</head>
<body>
    <header>
        <div id="logo">
            LOGO
        </div>
        <div id="nav">
            @include('layout.navigation')
        </div>
    </header>
    <div id="content">
        @if(Session::has('global'))
            <p>
                {{ Session::get('global') }}
            </p>
        @endif

        @yield('content')
    </div>
    <footer>
        Copyright and stuff
    </footer>
</body>
</html>
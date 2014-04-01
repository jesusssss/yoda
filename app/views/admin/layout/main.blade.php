<!DOCTYPE html>
    <html>
        <head>
            <title>
                Yoda ADMIN
            </title>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            {{ HTML::script("js/admin.js") }}
            {{ HTML::style("css/reset.css") }}
            {{ HTML::style("css/admin.css") }}
        </head>
        <body>
        @yield('content')
        </body>
    </html>
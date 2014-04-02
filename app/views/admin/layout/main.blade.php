<!DOCTYPE html>
    <html>
        <head>
            <title>
                Yoda ADMIN
            </title>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
            {{ HTML::script("js/admin.js") }}
            {{ HTML::style("css/reset.css") }}
            {{ HTML::style('css/admin.less', array("rel" => "stylesheet/less")) }}
            <script rel="stylesheet/less" src="http://cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>
        </head>
        <body>
        <div id="top">
            <div class="wrapper">
                <div id="nav">
                    @include('admin.layout.navigation')
                </div>
                <div id="view">
                    <a href="{{ URL::route('home') }}" target="_blank">
                        View site
                    </a>
                </div>
            </div>
        </div>
        <div id="bar">
            <div class="wrapper">
                <div id="pageTitle">
                    @yield('title')
                </div>
                <div id="pageMessage">
                    @if(Session::has('global'))
                        {{ HTML::image('img/admin/infoIcon.png') }}
                        {{ Session::get('global') }}
                    @endif
                </div>
                <div id="signout">
                    <a href="{{ URL::route('admin-signout') }}">
                        {{ HTML::image('img/admin/logoutIcon.png') }}
                        Signout
                    </a>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div id="content">
                @yield('content')
            </div>
        </div>
        </body>
    </html>
<!DOCTYPE html>
<html>
<head>
    <title>
        Auto College Aalborg
    </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,500,700,800,900,400italic,300italic,500italic,700italic,800italic' rel='stylesheet' type='text/css'/>
    {{ HTML::style('css/reset.css') }}
   {{ HTML::style('css/main.less', array("rel" => "stylesheet/less")) }}
   {{ HTML::script('js/main.js') }}
    <script rel="stylesheet/less" src="http://cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>

</head>
<body>
<div class="wrapper">
    <header>
        <div id="logo">
            <a href="{{ URL::route('home') }}">
                {{ HTML::image('img/logo.jpg') }}
            </a>
        </div>
        <div id="top">
            <div id="pageTitle">
                Datasamling, Grundforløb
            </div>
            <div id="nav">
                @include('layout.navigation')
            </div>
        </div>
    </header>
    <div id="content">
        @if(Session::has('global'))
            <div id="msg">
                {{ Session::get('global') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>
</body>
</html>
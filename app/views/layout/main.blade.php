<!DOCTYPE html>
<html>
<head>
    <title>
        Auto College Aalborg
    </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    {{ HTML::style('css/reset.css') }}
   {{ HTML::style('css/main.less', array("rel" => "stylesheet/less")) }}
   {{ HTML::script('js/main.js') }}
    <script rel="stylesheet/less" src="http://cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
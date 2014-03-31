<!DOCTYPE html>
<html>
<head>
    <title>
        Auto College Admin
    </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
                @include('admin.layout.navigation')
            </div>
        </div>
    </header>
    <div id="content">

    </div>
</div>
</body>
</html>
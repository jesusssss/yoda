<!DOCTYPE html>
<html>
<head>
    <title>
        Auto College Admin
    </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,500,700,800,900,400italic,300italic,500italic,700italic,800italic' rel='stylesheet' type='text/css'/>
    {{ HTML::style('css/reset.css') }}
    {{ HTML::style('admin/css/main.less', array("rel" => "stylesheet/less")) }}
    {{ HTML::script('admin/js/main.js') }}
    <script rel="stylesheet/less" src="http://cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>

</head>
<body>
<div class="loginWrapper">
    <header>
        <div id="logo">
           {{ HTML::image('admin/img/loginLogo.png') }}
        </div>
        <div id="top">
            <div id="pageTitle">
                Datasamling, Grundforløb
            </div>
            <div id="nav">
            </div>
        </div>
    </header>
    <div id="content">

    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Yoda ADMIN LOGIN
        </title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        {{ HTML::script("js/admin.js") }}
        {{ HTML::style("css/reset.css") }}
        {{ HTML::style('css/admin.less', array("rel" => "stylesheet/less")) }}
        <script rel="stylesheet/less" src="http://cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>
    </head>
    <body id="loginBody">
        <div id="loginTop">
            <div class="loginWrapper">
                {{ HTML::image("img/admin/adminLogo.png") }}
            </div>
        </div>
        <div class="loginWrapper">
            @if(Session::has('global'))
            <div id="msg">
                {{ Session::get('global') }}
            </div>
            @endif
            <form action="{{ URL::route('admin-login-post') }}" id="loginForm" method="post">
                <label for="username">Username</label>
                <input type="text" autofocus id="username" name="username" />
                @if($errors->has('username'))
                    <div id="msg">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <br/>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" />
                @if($errors->has('password'))
                    <div id="msg">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <br/>
                <input type="submit" value="Login"/>
                {{ Form::token() }}
            </form>
        </div>
    </body>
</html>
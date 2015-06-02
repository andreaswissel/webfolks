<!DOCTYPE html>
<html>
<head>
    <title>Webfolks</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet" media="screen">
</head>
<body>
    <main>
        <div class="navbar navbar-static-top">
            <div class="container">
                <a href="#" class="navbar-brand">WEBFOLKS.</a>

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sites <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/bootstrap">Bootstrap Example</a></li>
                            <li><a href="/">Index</a></li>
                            <li><a href="/auth/login">Login</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href='/forum'>Forum</a>
                    </li>
                    <li>
                        <a href='#'>Knowledge Base</a>
                    </li>
                </ul>
                @if(Auth::check())
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/profile"><i class="glyphicon glyphicon-user"></i> Mein Profil</a></li>
                            <li><a href="/backend"><i class="glyphicon glyphicon-cog"></i> Einstellungen</a></li>
                            <li><a href="/dashboard"><i class="glyphicon-dashboard glyphicon"></i> Dashboard</a></li>
                            <li><a href="/auth/logout"><i class="glyphicon glyphicon-arrow-left"></i> Ausloggen</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                @yield('jumbotron_title')
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <!-- JavaScript plugins (requires jQuery) -->
    <!--<script src="http://code.jquery.com/jquery.js"></script>-->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
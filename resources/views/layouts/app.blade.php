<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AECE BRIGADE</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Days+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/prism.css')}}">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .header {background-color: #09689a;}
        .header .brand{font-family: 'Days One', sans-serif;color: #ffffff;}
        .header a:visited{color: #ffffff;}
        .header a:link{color: #ffffff;}
        .header .brand a:hover{color: #cbedff;}

        .collapse .nav a:visited{color: #ffffff;}
        .collapse .nav a:link{color: #ffffff;}
        .collapse .nav a:hover{color: #cdcdcd;}
        .collapse .nav .dropdown-menu a:visited{color: #013b5b;}
        .collapse .nav .dropdown-menu a:link{color: #013b5b;}
        .collapse .nav .dropdown-menu a:hover{color: #013b5b;}
        .btn {background-color:#09689a;color: #ffffff;}
        .btn:hover{background-color:#0288d1;color: #ffffff;}
            .searchbox {
        width: 130px; height: 35px; margin-top: 7px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('/assets/img/search.gif');
        background-size: 20px 20px;
        background-position: 10px 8px; 
        background-repeat: no-repeat;
        padding: 5px 20px 5px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;}
        .searchbox img{height: 20px; width: auto;}
        .searchbox:focus {
    width: 400px;
}
.collapsa .nav .glyphicon-search{background-color:#09689a; }

h1,.color,h2{color: #c1cdd1;}
.content-11 h3{margin: 20px 20px 20px 20px;color:#245c96;}
.content-11 p{ }
.content-11{position: relative; background-color: #f5f6f6; opacity: .95; display:block; position: relative; 
margin:10px 10px 10px 10px; height: 500px; }
.content-11 img{width: 100%; height: auto; margin-top: 20px;}
.footer-down{background-color: #bfbfbf; height: 50px; opacity: .7;}
.footer-down p{margin-top: 15px; font-weight: bold;}
@media screen and (min-width: 500px) and (max-width: 990px) {
.content-11{position: relative; background-color: #f5f6f6; opacity: 1.0; 
margin:10px 10px 10px 10px; height: 800px; }
}
    </style>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top header">
        <div class="container">
            <div class="navbar-header brand">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    AECE BRIGADE
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/files') }}">Files</a></li>
                    <li><a href="{{ url('/members') }}">Members</a></li>
                    <li>{!! Form::open(['route'=>'search.index','method'=>'POST'])!!}
  <input class="searchbox" type="text" name="search"  placeholder="Search.." required><!-- {!! Form::submit('Hit')!!} -->
{!!Form::close()!!}</li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="/assets/avatars/{{ Auth::user()->avatar }}" style="width:40px; height:40px; float:left; border-radius: 50%; margin-right: 5px;margin-top: -10px;  "></span> &nbsp;&nbsp;&nbsp;
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                           

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                <li><a href="{{ url('/resume') }}"><i class="fa fa-btn fa-file-text-o"></i>Update Resume</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                            </ul>
                              <li><a href="{{ url('/notifications') }}"><i class="fa fa-btn glyphicon glyphicon-globe"></i></a></li>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <!-- <script type="text/javascript"  src="https://code.jquery.com/jquery-3.1.1.min.js" ></script> -->
    
</body>
</html>

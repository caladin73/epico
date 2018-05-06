<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>


  @if (Auth::check())
      <link rel="stylesheet" href="/css/styleEpico.css" />
      <link rel="stylesheet" href="/css/stylesheet.css" />
      <link rel="stylesheet" href="/css/hover.css" />
      <script src="/js/jquery-3.2.1.min.js"></script>
      <script src="/js/scripts.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  @else
    <link rel="stylesheet" href="/css/style.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <title>Laravel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
@endif
</head>
<body>

@if (\Illuminate\Support\Facades\Auth::user() != null)
    <h1 class="notify">PLEASE USE YOUR PHONE.. THANKS!</h1>
    <header>
        <nav class="navi">
            <div class="flex_top">

                <div id="menu">
                    <img src="/img/menu.svg" class="menuUp" />
                    <img src="/img/cross.svg" class="menuDown" />
                </div>

                <a href="/" style="position: relative;"><img src="/img/logo_white.png" alt="logo epico" height="26px;" style="margin-top: 10px;"><div class="notifications">{{\Illuminate\Support\Facades\Auth::user()->notifications}}</div></a>
                <div id="user">
                    <div id="userImg" style="background-image: url('/img/icon.jpg');"></div>
                    <!--<span>
                        Jane Doe
                    </span>-->
                </div>
            </div>
            <ul class="drop">
                <li>
                    <a href="/home/news" class="hvr-underline-from-left">News</a>
                </li>
                <li>
                    <a href="/" class="hvr-underline-from-left">Find et job</a>
                </li>
                <li>
                    <a href="/users/index" class="hvr-underline-from-left">Redigere profil</a>
                </li>
            </ul>
        </nav>
    </header>
    <div id="user-id" data-val="{{\Illuminate\Support\Facades\Auth::user()->id}}"></div>
@endif

<div id="container">
    @yield('content')
</div>

<footer>
    <div class="bottom_flex">
        <div id="logo_bottom">

        </div>
    </div>
    <span>
        EPICO - IT APS 2017 &#9400;
    </span>
</footer>

<!-- Notifications -->
@if (\Illuminate\Support\Facades\Auth::user() != null)
    <script src="/js/notifications.js"></script>
@endif
</body>

</html>

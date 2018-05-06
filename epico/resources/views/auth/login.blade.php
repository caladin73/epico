@extends('layouts.default')

@section('content')

    <header>
        <div class="header">
            <img src="/img/logoepico.png">
        </div>
    </header>
    <div class="login-section text-center">
        <!--<h2>Login to your account</h2>-->
        <div class="login-top">
            <p>Login with social</p>
            <ul>
                <li><a class="face" href="/auth/linkedin"><span class="face"> </span>Login with LinkedIn</a></li>
            </ul>
        </div>
        <form action="/auth/handleLogin" method="post">
            {{csrf_field()}}
            <div class="login-middle">
                <p>Login your email and password</p>
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="login-bottom">
                <div class="login-left">
                    <p>Dont have account?</p>
                    <a href="/auth/register">Make account</a>
                </div>
                <div class="login-right">
                    <input type="submit" value="Login">
                </div>
            </div>
        </form>
    </div>
    <style>
        body{
            background-image: url("../img/labsfons.jpg");
        }
    </style>
@stop
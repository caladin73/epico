@extends('layouts.default')

@section('content')

    <header>
        <div class="header">
            <img src="/img/logoepico.png">
        </div>
        <header>
        <div class="main">
            <div class="main-section">
                <div class="login-section">
                    <h2>Create your account</h2>

                    <form action="/auth/handleRegister" method="post">
                        {{csrf_field()}}
                        <div class="login-middle">
                            <p>Give us your information</p>
                            <input type="text" placeholder="name" name="name">
                            <input type="text" placeholder="email" name="email">
                            <input type="password" placeholder="password" name="password">
                            <input type="password" placeholder="Retype Password">

                        </div>
                        <div class="login-bottom">
                            <div class="login-left">
                                <p>Misstake?</p>
                                <a href="/auth/login">Go back</a>
                            </div>
                            <div class="login-right">
                                <input type="submit" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>&copy 2018 made for EPICO</p>
        </div>
        <style>
            body{
                background-image: url("../img/labsfons.jpg");
            }
        </style>
@stopgit
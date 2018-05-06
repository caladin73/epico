@extends('layouts.default')
@section('content')

    <div id="userWelcome">
        <h2>
            Hej!
        </h2>
        <h2>
            <b>
                {{$user->name}}
            </b>
        </h2>
        <div class="userFlex">
            <a href="/auth/logout">Log ud</a>
            <a href="/users/edit">Edit</a>
            <a href="/users/password">Change Password</a>
        </div>
        <ul>
            <li>
                Name: {{$user->name}}
            </li>
            <li>
                Email: {{$user->email}}
            </li>
            <li>
                Password: **************
            </li>
        </ul>
    </div>
@stop
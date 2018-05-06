@extends('layouts.default')
@section('content')

    <div id="userWelcome">

        @if(isset($error))
            <span style="margin: 10px; color: red;">{{$error}}</span>
        @endif

        <form action="/users/passwordHandle" method="post" class="user-edit">
            {{csrf_field()}}

            <label for="">Password</label><br/>
            <input type="password" name="password" placeholder="Password" /><br/>
            <input type="password" name="passwordCheck" placeholder="Password Check" /><br/>

            <input type="submit" value="Edit" />
        </form>

    </div>
@stop
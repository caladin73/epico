@extends('layouts.default')
@section('content')

    <div id="userWelcome">

        <form action="/users/editHandle" method="post" class="user-edit">
            {{csrf_field()}}

            <label for="">General</label><br/>
            <input type="text" name="name" placeholder="Name" value="{{$user->name}}" /><br/>
            <input type="email" name="email" placeholder="Email"  value="{{$user->email}}" readonly /><br/>
            <label for="">Address</label><br/>
            @if (isset($contact))
                <input type="text" name="street" placeholder="Street" value="{{$contact->street}}" /><br/>
                <input type="text" name="city" placeholder="City" value="{{$contact->city}}" /><br/>
                <input type="text" name="country" placeholder="Country" value="{{$contact->country}}" /><br/>
                <input type="text" name="zip_code" placeholder="Zip Code" value="{{$contact->zip_code}}" /><br/>
            @else
                <input type="text" name="street" placeholder="Street" /><br/>
                <input type="text" name="city" placeholder="City" /><br/>
                <input type="text" name="country" placeholder="Country" /><br/>
                <input type="text" name="zip_code" placeholder="Zip Code" /><br/>
            @endif
            <input type="submit" value="Edit" />
        </form>

    </div>
@stop
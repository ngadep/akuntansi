@extends('layouts.default')

@section('css')
@stop

@section('navbar')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="{{action('Auth\AuthController@postRegister')}}">
        {!! csrf_field() !!}

        <h2 class="form-signin-heading">Sign Up</h2>

        <div class="form-group ">
            <input class="form-control" placeholder="username" autofocus="autofocus" name="username" type="text"
                    value="{{ old('username') }}">
        </div>

        <div class="form-group ">
            <input class="form-control" placeholder="email" name="email" type="email" value="{{ old('email') }}">
        </div>

        <div class="form-group ">
            <input class="form-control" placeholder="password" name="password" type="password"
                   value="{{ old('name') }}">
        </div>

        <div class="form-group ">
            <input class="form-control" placeholder="Confirm password" name="password_confirmation" type="password" value="">
        </div>

        <input class="btn btn-primary" type="submit" value="Register">
        <a class="btn btn-default" href="/">Cancel</a>

        </form>
    </div>
@stop
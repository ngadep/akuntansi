@extends('layouts.default')

@section('css')
@stop

@section('navbar')
@stop

@section('content')
          <div class="col-md-4 col-md-offset-4">
              <form method="POST" action="{{action('Auth\AuthController@postLogin')}}">
                  {!! csrf_field() !!}

                  <h2 class="form-signin-heading">Sign In</h2>

                  <div class="form-group ">
                      <input class="form-control" placeholder="email" autofocus="autofocus" name="email" type="email">
                  </div>

                  <div class="form-group ">
                      <input class="form-control" placeholder="password" name="password" type="password" value="">
                  </div>

                  <input class="btn btn-primary" type="submit" value="Sign In">
                  <a class="btn btn-default" href="{{action('Auth\AuthController@getRegister')}}">Sign Up</a>
              </form>
          </div>
      </div>
    </div>
@stop
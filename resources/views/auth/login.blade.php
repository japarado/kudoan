@extends('base')

@section('title')
    Sign in
@endsection

@section('login-active')
    active
@endsection

@section('content')
    {{ Form::open(['route' => 'login', 'method' => 'post', 'class' => ['form-signin']]) }}
    {{ Form::token() }}
    <h1 class="h3 mb-3 font-weight-normal text-center">E-Manager - Sign In</h1>
    @if($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    @if($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif

    {{ Form::label('inputEmail', 'Email Address', ['class' => 'sr-only']) }}
    {{ Form::text('email', '', ['class' => 'form-control', 'id' => 'inputEmail', 'required' => 'true', 'placeholder' => 'Email']) }}

    {{ Form::label('inputPassword', 'Password', ['class' => 'sr-only']) }}
    {{ Form::password('password', ['class' => 'form-control', 'id' => 'inputPassword', 'required' => 'true', 'placeholder' => 'Password']) }}

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me">Remember Me
        </label>
    </div>

    {{ Form::submit('Sign In', ['class' => 'btn btn-large btn-primary btn-block', 'type' => 'submit']) }}
    {{ Form::close() }}
    <!--<form class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
        </form>-->
    @endsection

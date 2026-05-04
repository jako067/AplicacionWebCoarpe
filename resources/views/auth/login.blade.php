@extends('layout.layout')
@section('title', __('auth.login_title'))
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf

        <label for="username"> {{ __('auth.username') }}:</label> <br>
        <input type="text" name="username" id="username" value="{{old('username')}}"><br>
        <label for="password"> {{ __('auth.password') }}:</label> <br>
        <input type="password" name="password" id="password"><br>
        <label for="remember"> {{ __('auth.remember_me') }}</label><br>
        <input type="checkbox" name="remember" id="remember" {{old('remember') ? 'checked' : ''}}>
        <button type="submit"> {{ __('auth.login_button') }}</button>

@endsection

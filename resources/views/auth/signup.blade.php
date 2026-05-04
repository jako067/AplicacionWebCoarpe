@extends('layout.layout')
@section('title', __('auth.signup_title'))
@section('content')

    <form action="{{ route('signup') }}" method="post">
        @csrf

        <label for="username">{{ __('auth.username') }}:</label><br>
        <input type="text" name="username" id="username" value="{{ old('username') }}">
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="name">{{ __('auth.full_name') }}:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="email">{{ __('auth.email') }}:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="phone">{{ __('auth.phone') }}:</label><br>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
        @error('phone')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="DNI">{{ __('auth.dni') }}:</label><br>
        <input type="text" name="DNI" id="DNI" value="{{ old('DNI') }}">
        @error('DNI')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="password">{{ __('auth.password') }}:</label><br>
        <input type="password" name="password" id="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <br>

        <label for="password_confirmation">{{ __('auth.confirm_password') }}:</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation">
        <br><br>

        <button type="submit">{{ __('auth.signup_button') }}</button>

    </form>

@endsection

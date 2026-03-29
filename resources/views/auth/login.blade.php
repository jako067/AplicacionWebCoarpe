@extends('layout.layout')
@section('title','Login')
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf

        <label for="username"> Nombre de Usuario:</label> <br>
        <input type="text" name="username" id="username" value="{{old('username')}}"><br>
        <label for="password"> Contraseña:</label> <br>
        <input type="password" name="password" id="password"><br>
        <label for="remember"> Recuérdame</label><br>
        <input type="checkbox" name="remember" id="remember" {{old('remember') ? 'checked' : ''}}>
        <button type="submit"> Iniciar Sesion</button>

@endsection

@extends('layout.layout')
@section('title','Signup')
@section('body')

    <form action="{{route('signup')}}" method="post">
        @csrf

        <label for="username"> Nombre de Usuario:</label> <br>
        <input type="text" name="username" id="username" value="{{old('username')}}"><br>
        <label for="name"> Nombre completo:</label> <br>
        <input type="text" name="name" id="name" value="{{old('name')}}"><br>
        <label for="email"> Correo electrónico:</label> <br>
        <input type="email" name="email" id="email" value="{{old('email')}}"><br>
        <label for="phone">Número de teléfono</label><br>
        <input type="text" name="phone" id="phone" value="{{old('email')}}"><br>
        <label for="DNI">Número de DNI</label><br>
        <input type="text" name="DNI" id="DNI" value="{{old('DNI')}}"><br>
        <label for="password"> Contraseña:</label> <br>
        <input type="password" name="password" id="password" value="{{old('password')}}"><br>
        <label for="password_confirmation"> Confirmar contraseña:</label> <br>
        <input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}"><br>
        <button type="submit">Registrarse</button>

    </form>

@endsection


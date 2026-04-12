@extends('layout.layout')
@section('title','Inicio')
@section('content')
    Esto es el inicio de la aplicación.

    @auth
        Bienvenido {{Auth::user()->name}}
    @endauth
@endsection

@extends('layout.layout')
@section('title','Inicio')
@section('body')
    Esto es el inicio de la aplicación.

    @auth
        Bienvenido {{Auth::user()->name}}
    @endauth
@endsection

@extends('layout.layout')
@section('title','Perfil')
@section('body')

<br>
    {{Auth::user()->name}}
    <br>
    {{Auth::user()->username}}
    <br>
    {{Auth::user()->email}}
    <br>
    {{Auth::user()->phone}}
    <br>
    {{Auth::user()->DNI}}
    <br>     

@endsection

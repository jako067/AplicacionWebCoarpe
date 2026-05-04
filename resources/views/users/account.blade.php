@extends('layout.layout')
@section('title', __('users.title_profile'))
@section('content')

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

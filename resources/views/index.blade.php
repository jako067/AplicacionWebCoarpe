@extends('layout.layout')
@section('title','Inicio')
@section('content')
    Esto es el inicio de la aplicación.

    @auth
        Bienvenido {{Auth::user()->name}}
        @if (auth()->user()->isAdmin())
         <ul>
        <li style="margin-bottom: 15px;">
            <strong>Materiales:</strong>
            <a href="{{ route('materials.index') }}" style="margin-left: 10px;">Ir al Listado</a> |
            <a href="{{ route('materials.create') }}"> Crear Material</a>
        </li>

        <li>
            <strong>Presupuestos:</strong>
            <a href="{{ route('budgets.index') }}" style="margin-left: 10px;"> Ir al Listado</a> |
            <a href="{{ route('budgets.create') }}"> Crear Presupuesto</a>
        </li>
    </ul>
    @endif


    @endauth








@endsection

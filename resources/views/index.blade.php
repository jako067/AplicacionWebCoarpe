@extends('layout.layout')

@section('title', __('Inicio'))

@section('content')

<div class="container-fluid max-w-4xl">

    @auth
    <div class="card border-0 shadow-sm p-5 text-center">

        <div class="mb-3">
            <i class="bi bi-person-circle text-verde-oscuro" style="font-size: 4rem;"></i>
        </div>

        <h2 class="fw-bold text-dark mb-1">{{ __('Bienvenido') }}, {{ Auth::user()->name }}</h2>
        <p class="text-muted mb-3">
            {{ Auth::user()->isAdmin() ? __('Administrador') : (Auth::user()->rol === 'foreman' ? __('Capataz') : __('Trabajador')) }}
        </p>

        <hr class="w-25 mx-auto text-muted opacity-25 mb-3">

       

    </div>
    @endauth

</div>

@endsection

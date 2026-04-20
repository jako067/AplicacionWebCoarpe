@extends('layout.layout')

@section('title','Perfil')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">

        <h2 class="mb-4 text-center">Mi Perfil</h2>

        <div class="text-center mb-4">
            <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
        </div>

        <div class="list-group">
            <div class="list-group-item">
                <strong>Nombre:</strong> {{ Auth::user()->name }}
            </div>

            <div class="list-group-item">
                <strong>Usuario:</strong> {{ Auth::user()->username }}
            </div>

            <div class="list-group-item">
                <strong>Email:</strong> {{ Auth::user()->email }}
            </div>

            <div class="list-group-item">
                <strong>Teléfono:</strong> {{ Auth::user()->phone }}
            </div>

            <div class="list-group-item">
                <strong>DNI:</strong> {{ Auth::user()->DNI }}
            </div>
        </div>

    </div>
</div>

@endsection

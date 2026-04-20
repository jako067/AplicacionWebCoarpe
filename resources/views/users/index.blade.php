@extends('layout.layout')

@section('title', 'Faltas')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">

        <h2 class="mb-4 text-center">Gestión de Faltas</h2>

        <div class="row g-3">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">

                            <h5 class="card-title">{{ $user->name }}</h5>

                            <div class="d-flex flex-column gap-2 mt-3">
                                <a href="{{ route('absences.index', $user->id) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    Ver faltas
                                </a>

                                <a href="{{ route('absences.create', $user->id) }}"
                                   class="btn btn-outline-success btn-sm">
                                    Añadir falta
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection

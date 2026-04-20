@extends('layout.layout')
@section('title', 'ListaFaltas')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Faltas de {{ $user->name }}</h2>

        @if($absences->isEmpty())
            <p class="text-center text-muted">No hay faltas registradas</p>
        @else
            <div class="list-group">
                @foreach ($absences as $absence)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $absence->fecha }}</strong>
                            <span class="badge bg-secondary ms-2">{{ $absence->tipo }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection

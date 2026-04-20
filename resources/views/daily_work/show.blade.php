@extends('layout.layout')

@section('title', 'Detalle Daily Work')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Detalle de Daily Work</h2>

        <div class="mb-3">
            <h5 class="text-primary">Work ID: {{ $dailyWork->work_id }}</h5>
        </div>

        <ul class="list-group mb-4">
            <li class="list-group-item">
                <strong>Reporte:</strong> {{ $dailyWork->reporte }}
            </li>
            <li class="list-group-item">
                <strong>Fecha:</strong> {{ $dailyWork->date }}
            </li>
            <li class="list-group-item">
                <strong>Evaluación:</strong> {{ $dailyWork->evaluation }}
            </li>
            <li class="list-group-item">
                <strong>Incidencias:</strong> {{ $dailyWork->Incidences }}
            </li>
        </ul>

        <div class="d-flex gap-2">
            <a href="{{ route('daily_work.edit', $dailyWork->id) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('daily_work.index') }}" class="btn btn-outline-secondary">
                Volver
            </a>
        </div>
    </div>
</div>

@endsection

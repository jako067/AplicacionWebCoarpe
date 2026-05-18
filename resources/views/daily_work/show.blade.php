@extends('layout.layout')

@section('title', 'Detalle Daily Work')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">

        <h2 class="mb-3">Detalle del Daily Work</h2>

        <p><strong>Grupo:</strong> {{ $dailyWork->group->name ?? 'Sin grupo' }}</p>
        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($dailyWork->date)->format('d/m/Y') }}</p>

        <hr>

        <p><strong>Reporte:</strong></p>
        <p>{{ $dailyWork->reporte }}</p>

        <hr>

        <p><strong>Evaluación:</strong> {{ $dailyWork->evaluation }}</p>

        <hr>

        <p><strong>Incidencias:</strong></p>
        <p>{{ $dailyWork->incidences }}</p>

        <a href="{{ route('daily_work.index') }}" class="btn btn-secondary mt-3">
            Volver
        </a>

    </div>
</div>

@endsection

@extends('layout.layout')

@section('title', 'Detalle de Jornada')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Jornada #{{ $task->id_task }}</h2>

        <h5 class="section-title mb-3">Datos de la Jornada</h5>

        <ul class="list-group mb-4">
            <li class="list-group-item">
                <strong>Fecha:</strong> {{ $task->task_date }}
            </li>
            <li class="list-group-item">
                <strong>Hora de Entrada:</strong> {{ $task->entry_time }}
            </li>
            <li class="list-group-item">
                <strong>Hora de Salida:</strong> {{ $task->exit_time }}
            </li>
            <li class="list-group-item">
                <strong>Descanso:</strong> {{ $task->break_minutes }} minutos
            </li>
            <li class="list-group-item">
                <strong>Horas Extra:</strong> {{ $task->extra_hours }} h
            </li>
            <li class="list-group-item fw-bold text-primary">
                Total Horas: {{ $task->total_hours }} h
            </li>
        </ul>

        <div class="d-flex gap-2">
            <a href="{{ route('tasks.edit', $task->id_task) }}" class="btn btn-primary">
                Editar
            </a>

            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                Volver
            </a>
        </div>
    </div>
</div>

@endsection

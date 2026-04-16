@extends('layout.layout')

@section('title', 'Detalle de Jornada')

@section('content')
    <h2>Jornada #{{ $task->id_task }}</h2>

    <h3>Datos de la Jornada:</h3>
    <ul>
        <li><strong>Fecha:</strong> {{ $task->task_date }}</li>
        <li><strong>Hora de Entrada:</strong> {{ $task->entry_time }}</li>
        <li><strong>Hora de Salida:</strong> {{ $task->exit_time }}</li>
        <li><strong>Descanso:</strong> {{ $task->break_minutes }} minutos</li>
        <li><strong>Horas Extra:</strong> {{ $task->extra_hours }} h</li>
        <li><strong>Total Horas Trabajadas: {{ $task->total_hours }} h</strong></li>
    </ul>

    <br>
    <a href="{{ route('tasks.edit', $task->id_task) }}">
        <button>Editar</button>
    </a>

    <a href="{{ route('tasks.index') }}">
        <button>Volver</button>
    </a>
@endsection

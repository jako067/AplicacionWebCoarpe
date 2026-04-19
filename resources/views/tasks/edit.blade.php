@extends('layout.layout')

@section('title', 'Editar Jornada')

@section('content')
    <h2>Editar Jornada {{ $task->id_task }}</h2>

    <form action="{{ route('tasks.update', $task->id_task) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="task_date">Fecha:</label><br>
        <input type="date" name="task_date" id="task_date" value="{{ old('task_date', $task->task_date) }}">
        @error('task_date') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="entry_time">Hora de Entrada:</label><br>
        <input type="time" name="entry_time" id="entry_time" value="{{ old('entry_time', $task->entry_time) }}">
        @error('entry_time') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="exit_time">Hora de Salida:</label><br>
        <input type="time" name="exit_time" id="exit_time" value="{{ old('exit_time', $task->exit_time) }}">
        @error('exit_time') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="break_minutes">Minutos de Descanso:</label><br>
        <input type="number" name="break_minutes" id="break_minutes" min="0" value="{{ old('break_minutes', $task->break_minutes) }}">
        @error('break_minutes') <span>{{ $message }}</span> @enderror
        <br><br>

        <label for="extra_hours">Horas Extra (marcadas por el capataz):</label><br>
        <input type="number" step="0.25" name="extra_hours" id="extra_hours" min="0" value="{{ old('extra_hours', $task->extra_hours) }}">
        @error('extra_hours') <span>{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">Recalcular y Actualizar</button>
        <a href="{{ route('tasks.index') }}">Volver</a>
    </form>
@endsection

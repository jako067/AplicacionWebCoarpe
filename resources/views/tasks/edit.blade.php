@extends('layout.layout')

@section('title', 'Editar Jornada')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Editar Jornada {{ $task->id_task }}</h2>

        <form action="{{ route('tasks.update', $task->id_task) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <h5 class="section-title">Datos de la Jornada</h5>

                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="task_date" class="form-control"
                        value="{{ old('task_date', $task->task_date) }}">
                    @error('task_date')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Hora de Entrada</label>
                    <input type="time" name="entry_time" class="form-control"
                        value="{{ old('entry_time', $task->entry_time) }}">
                    @error('entry_time')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Hora de Salida</label>
                    <input type="time" name="exit_time" class="form-control"
                        value="{{ old('exit_time', $task->exit_time) }}">
                    @error('exit_time')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <h5 class="section-title">Descansos y Horas Extra</h5>

                <div class="mb-3">
                    <label class="form-label">Minutos de Descanso</label>
                    <input type="number" name="break_minutes" class="form-control" min="0"
                        value="{{ old('break_minutes', $task->break_minutes) }}">
                    @error('break_minutes')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Horas Extra</label>
                    <input type="number" step="0.25" name="extra_hours" class="form-control" min="0"
                        value="{{ old('extra_hours', $task->extra_hours) }}">
                    @error('extra_hours')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Recalcular y Actualizar
                </button>

                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                    Volver
                </a>
            </div>
        </form>
    </div>
</div>

@endsection

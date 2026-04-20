@extends('layout.layout')

@section('title', 'Registrar Jornada')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Registrar Nueva Jornada</h2>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <h5 class="section-title">Datos de la Jornada</h5>

                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="task_date" class="form-control"
                        value="{{ old('task_date', now()->format('Y-m-d')) }}">
                    @error('task_date')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Hora de Entrada</label>
                    <input type="time" name="entry_time" class="form-control" value="{{ old('entry_time') }}">
                    @error('entry_time')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Hora de Salida</label>
                    <input type="time" name="exit_time" class="form-control" value="{{ old('exit_time') }}">
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
                        value="{{ old('break_minutes', 0) }}">
                    @error('break_minutes')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Horas Extra</label>
                    <input type="number" step="0.25" name="extra_hours" class="form-control" min="0"
                        value="{{ old('extra_hours', 0) }}">
                    @error('extra_hours')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Guardar Jornada</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection

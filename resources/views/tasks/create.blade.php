@extends('layout.layout')

@section('title', 'Registrar Jornada')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver al historial">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">Registrar Nueva Jornada</h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4">

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-clock-history fs-5 me-2 text-verde-oscuro"></i>
                    <h5 class="fw-bold mb-0 text-dark">Datos de la Jornada</h5>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="task_date" class="form-label text-muted fw-semibold small mb-1">Fecha <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('task_date') is-invalid @enderror" name="task_date" id="task_date" value="{{ old('task_date', now()->format('Y-m-d')) }}">
                        @error('task_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="entry_time" class="form-label text-muted fw-semibold small mb-1">Hora de Entrada <span class="text-danger">*</span></label>
                        <input type="time" class="form-control @error('entry_time') is-invalid @enderror" name="entry_time" id="entry_time" value="{{ old('entry_time') }}">
                        @error('entry_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="exit_time" class="form-label text-muted fw-semibold small mb-1">Hora de Salida <span class="text-danger">*</span></label>
                        <input type="time" class="form-control @error('exit_time') is-invalid @enderror" name="exit_time" id="exit_time" value="{{ old('exit_time') }}">
                        @error('exit_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-plus-circle-fill fs-5 me-2 text-verde-oscuro"></i>
                    <h5 class="fw-bold mb-0 text-dark">Descansos y Horas Extra</h5>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="break_minutes" class="form-label text-muted fw-semibold small mb-1">Minutos de Descanso</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-cup-hot"></i></span>
                            <input type="number" class="form-control @error('break_minutes') is-invalid @enderror" name="break_minutes" id="break_minutes" min="0" value="{{ old('break_minutes', 0) }}">
                            <span class="input-group-text bg-light text-muted">min</span>
                            @error('break_minutes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="extra_hours" class="form-label text-muted fw-semibold small mb-1">Horas Extra <span class="fw-normal text-black-50">(Validadas por capataz)</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-stopwatch"></i></span>
                            <input type="number" step="0.25" class="form-control @error('extra_hours') is-invalid @enderror" name="extra_hours" id="extra_hours" min="0" value="{{ old('extra_hours', 0) }}">
                            <span class="input-group-text bg-light text-muted">h</span>
                            @error('extra_hours')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('tasks.index') }}" class="btn btn-light border px-4 shadow-sm">Cancelar</a>
                <button type="submit" class="btn btn-verde-oscuro fw-semibold px-4 shadow-sm">
                    <i class="bi bi-save me-2"></i> Guardar Jornada
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

@extends('layout.layout')

@section('title', 'Editar Parte Diario')

@section('content')
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('daily_work.index') }}" class="btn btn-sm btn-outline-secondary me-3 shadow-sm" title="Volver al listado">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <h2 class="fw-bold mb-0 text-dark">Editar Parte de Trabajo Diario</h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4">
        <h3 class="mb-4 text-center fs-5 text-muted text-uppercase tracking-wider">Modificar Registro #{{ $dailyWork->id }}</h3>

        <form action="{{ route('daily_work.update', $dailyWork->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6 mb-3">
                    <label for="date" class="form-label text-muted fw-semibold small mb-1">Fecha del Informe <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-calendar3"></i></span>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ old('date', $dailyWork->date) }}">
                        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="group_id" class="form-label text-muted fw-semibold small mb-1">Grupo / Cuadrilla Asignada <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-building"></i></span>
                        <select class="form-select @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
                            <option value="">-- Selecciona un grupo --</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" {{ old('group_id', $dailyWork->group_id) == $group->id ? 'selected' : '' }}>
                                    {{ $group->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('group_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="reporte" class="form-label text-muted fw-semibold small mb-1">Reporte de Trabajo Diario <span class="text-danger">*</span></label>
                <textarea class="form-control @error('reporte') is-invalid @enderror" name="reporte" id="reporte" rows="5" placeholder="Describe las tareas ejecutadas... Layout, hormigonado, excavación, etc.">{{ old('reporte', $dailyWork->reporte) }}</textarea>
                @error('reporte') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row g-3">
                <div class="col-md-6 mb-4">
                    <label for="evaluation" class="form-label text-muted fw-semibold small mb-1">Evaluación del Rendimiento</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-award"></i></span>
                        <input type="text" class="form-control @error('evaluation') is-invalid @enderror" name="evaluation" id="evaluation" value="{{ old('evaluation', $dailyWork->evaluation) }}" placeholder="Ej: Excelente, Normal, Retraso por clima">
                        @error('evaluation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="incidences" class="form-label text-muted fw-semibold small mb-1">Incidencias o Contratiempos</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-exclamation-triangle"></i></span>
                        <input type="text" class="form-control @error('incidences') is-invalid @enderror" name="incidences" id="incidences" value="{{ old('incidences', $dailyWork->incidences) }}" placeholder="Ej: Rotura de maquinaria, falta de suministro">
                        @error('incidences') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <hr class="text-secondary opacity-25 mb-4">

            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('daily_work.index') }}" class="btn btn-light border px-4 py-2 fw-medium">Cancelar</a>
                <button type="submit" class="btn btn-verde-oscuro fw-semibold px-4 py-2 shadow-sm">
                    <i class="bi bi-check-circle me-2"></i> Actualizar Parte Diario
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
